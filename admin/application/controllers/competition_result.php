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
	$gridObj->cellEdit = true;
        $gridObj->cellUrl = site_url('competition_result/cell_edit');
        $gridColumn = array('Competition Name','Year', 'Round', 'Class', 'Date', 'Status','How Much Race','2 for Drop');
        $gridColumnModel = array(
            array("name" => "competitionr_name ",
                "index" => "competitionr_name ",
                "width" => 50,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            ),
             array("name" => "year",
                "index" => "year",
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
            ),
            array("name" => "how_much_race",
                "index" => "how_much_race",
                "width" => 50,
                "sortable" => true,
                "align" => "center",
                "editable" => true
            ),
             array("name" => "drop_status",
                "index" => "drop_status",
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
        if (isset($_POST['save'])) {
            $competition_id = $_POST['competitionr_id'];
            $competition_round = trim($_POST['competitionr_details_id']);
            $class_id = $_POST['class_id'];
            $year = $_POST['year'];
            require_once 'reader.php';
            $data = new Spreadsheet_Excel_Reader();
            $filename = $_FILES["file"]["tmp_name"];
            $data->read("$filename");
            $result_id = $this->mod_competition_result->add_product_table();
            $x = 2;
            while ($x <= $data->sheets[0]['numRows']) {
                
                $position = $data->sheets[0]["cells"][$x][1];
                $start = $data->sheets[0]["cells"][$x][2];
                //$competitor = $data->sheets[0]["cells"][$x][3];
		$competitor_lower = $data->sheets[0]["cells"][$x][3];
		$competitor = strtoupper($competitor_lower);
                $total = $data->sheets[0]["cells"][$x][4];
                $r1 = $data->sheets[0]["cells"][$x][5];
                
                $r2 = $data->sheets[0]["cells"][$x][6];
                $r3 = $data->sheets[0]["cells"][$x][7];
                $r4 = $data->sheets[0]["cells"][$x][8];
                $r5 = $data->sheets[0]["cells"][$x][9];
                $r6 = $data->sheets[0]["cells"][$x][10];
                $r7 = $data->sheets[0]["cells"][$x][11];
                $sql = "INSERT into competitor(competition_id,year,round_id,class_id,result_id,position,start,competitor,total,r1_score,r2_score,r3_score,r4_score,r5_score,r6_score,r7_score) values('$competition_id','$year','$competition_round','$class_id','$result_id','$position','$start','$competitor','$total','$r1','$r2','$r3','$r4','$r5','$r6','$r7')";
                //echo $sql . '\n'; exit;
                mysql_query($sql);
                $x++;
            }
            redirect('competition_result');
        }
        $data['editor'] = TRUE;
        $data['dir'] = 'competition_result';
        $data['page'] = 'add_competition_result';
        $data['action'] = 'competition_result/add_competition_result';
        $this->load->view('main', $data);
    }

    function edit_competition_result($competition_result_id='') {
        $data = sql::row("competition_result", "competition_result_id=$competition_result_id");
        $data['competitor'] = sql::rows('competitor', "result_id=$competition_result_id");
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
        redirect('competition_result');
    }

    function com_status($status='', $competition_result_id='') {
        if ($competition_result_id == '') {
            redirect('competition_result');
        }
        $con = "competition_result_id='$competition_result_id'";
        $updateOp = "status='$status'";
        sql::change_status('competition_result', $con, $updateOp);
        $this->session->set_flashdata('msg', 'Status Updated!!!');
        redirect('competition_result');
    }
	
	function cell_edit() {
        $id = $_REQUEST['id'];
        if($_REQUEST['how_much_race']){
        $this->db->update("competition_result", array('how_much_race' => $_REQUEST['how_much_race']), array('competition_result_id' => $id));
        }
        
        //if($_REQUEST['drop_status']){
          //  $this->db->update("competition_result", array('drop_status' => $_REQUEST['drop_status']), array('competition_result_id' => $id));
        //}
		
	if($_REQUEST['drop_status']){
        $this->db->update("competition_result", array('drop_status' => $_REQUEST['drop_status']), array('competition_result_id' => $id));
        $result_info = sql::row("competition_result", "competition_result_id=$id");
        $count_info = sql::rows('competition_result', "competition_id=$result_info[competition_id] group by round_id", "round_id");
        $class_id = $result_info['class_id'];
        $description = sql::rows('competitor', "class_id=$class_id and competition_id=$result_info[competition_id] group by competitor order by t desc", "sum(total) as t,competitor,start");
        foreach ($description as $c) {
            $items = array();
            foreach ($count_info as $info) {
                $total1 = sql::row("competitor", "competitor='$c[competitor]' and class_id='$class_id' and competition_id='$result_info[competition_id]' and round_id='$info[round_id]'", "total");
                $all_total+=$total1['total'];
                if ($total1['total'] == '') {
                    $total1['total'] = 0;
                }
                $items[] = $total1['total'];
                $total1['total'] = 0;
            }
            $minimum = min($items);
            $new_total = $all_total - $minimum;
//                echo $all_total.',';
//                echo $minimum.',';
//                echo $new_total.',';
            //print_r($items);exit; 
            $this->db->update("competitor", array('new_total' => $new_total), array('competition_id' => $result_info[competition_id], 'class_id' => $class_id, 'competitor' => $c[competitor]));
            $all_total = 0;
        } 
        }
		
		
    }
    
     function get_year() {
        echo $this->mod_competition_result->get_year_options($_POST['competitionr_id']);
    }
     function get_round() {
        echo $this->mod_competition_result->get_round_options($_POST['competitionr_id']);
    }
     function get_class() {
        echo $this->mod_competition_result->get_class_options($_POST['competitionr_id']);
    }

}

?>