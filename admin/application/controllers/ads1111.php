<?php

class ads extends Controller {

    private $dir = 'ads';

    function __construct() {
        parent::__construct();
        common::is_logged();
        $this->load->model('ads_model');
    }

    function index($table_name = 'road_bikes') {
        if($table_name!=''){
        $this->session->set_userdata('table_name', "$table_name");
        }
        $data['nav_array'] = array(
            array('title' => 'Manage Ads', 'url' => '')
        );
        $this->load->library('grid');
        $gridObj = new grid();
        $gridColumn = array('Bike Details', 'Type', 'Make', 'Model', 'Area', 'Status');
        $gridColumnModel = array(
            array("name" => "",
                "index" => "",
                "width" => 250,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            ),
            array("name" => "",
                "index" => "",
                "width" => 150,
                "sortable" => true,
                "align" => "center",
                "editable" => true
            ),
            array("name" => "",
                "index" => "",
                "width" => 150,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            ),
            array("name" => "",
                "index" => "",
                "width" => 100,
                "sortable" => true,
                "align" => "center",
                "editable" => true
            ),
            array("name" => "",
                "index" => "",
                "width" => 100,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            ),
            array("name" => "",
                "index" => "",
                "width" => 100,
                "sortable" => true,
                "align" => "center",
                "editable" => true
            )
        );
        if ($_POST['search']) {
            $gridObj->setGridOptions("Manage Ads", 880, 300, "bike_id", "desc", $gridColumn, $gridColumnModel, site_url('?c=ads&m=load_ads&type_id=' . $_POST['type_id'] . '&area_id=' . $_POST['area_id'] . '&company_id=' . $_POST['company_id'] . '&model_id=' . $_POST['model_id']), true);
        } else {
            $gridObj->setGridOptions("Manage Ads", 880, 300, "bike_id", "desc", $gridColumn, $gridColumnModel, site_url('ads/load_ads/'), true);
        }
        $data['grid_data'] = $gridObj->getGrid();

        //print_r($data['grid_data']);

        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = $this->dir;
        $data['page'] = 'index';
        $data['page_title'] = 'Manage Ads';
        $this->load->view('main', $data);
    }

    function load_ads() {
        $this->ads_model->get_ads_grid();
    }

    function delete_ads($id = '') {

        $table_name = $this->session->userdata('table_name');
        if ($table_name == '') {
            redirect('login');
        }

        $bike_id = $id;
        if ($bike_id == '') {
            redirect('ads');
        }
        $tab_name = $table_name . '_image';
        $all_image = sql::rows("$tab_name", "bike_id=$bike_id");
        foreach ($all_image as $file) {
            @unlink(UPLOAD_PATH . "$tab_name/" . $file['bike_image']);
            @unlink(UPLOAD_PATH . "$tab_name/t_" . $file['bike_image']);
            @unlink(UPLOAD_PATH . "$tab_name/l_" . $file['bike_image']);
        }

        $this->db->delete("$table_name", array('bike_id' => $bike_id));
        $this->db->delete("$tab_name", array('bike_id' => $bike_id));
        $this->db->delete('save_ad', array('bike_id' => $bike_id,'table_name'=>$table_name));
        $this->session->set_flashdata('msg', 'Successfully Deleted!!!');
        common::redirect();
    }

    function ads_status($status = 1, $id = '') {
        $table_name = $this->session->userdata('table_name');
        if ($table_name == '') {
            redirect('login');
        }
        $bike_id = $id;
        if ($bike_id == '') {
            redirect('ads');
        }
        $data = array('bike_status' => $status);
        $this->db->update("$table_name", $data, array('bike_id' => $bike_id));

        $this->session->set_flashdata('msg', 'Status Updated!!!');
        redirect('ads/index/'.$table_name);
    }

    public function do_resize($file = '') {
        // echo $filename;
        //$filename = $this->input->post('new_val');
        //echo base_url() . 'uploads/bike_image/' . $bike_image; 
        // $source_path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/avatar/tmp/' . $filename;
        $source_path = 'uploads/bike_image/' . $file;
        echo $source_path;
        // $target_path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/bike_image/';
        $target_path = 'uploads/bike_image/';
        $config = array(
            'image_library' => 'gd2',
            'source_image' => $source_path,
            'new_image' => $target_path,
            'maintain_ratio' => TRUE,
            'create_thumb' => TRUE,
            'thumb_marker' => '_thumb',
            'width' => 150,
            'height' => 150
        );
        // $this->image_lib->initialize($config);
        $this->load->library('image_lib');
        $this->image_lib->initialize($config);
        if (!$this->image_lib->resize()) {
            echo $this->image_lib->display_errors();
        }
        // clear //
        $this->image_lib->clear();
    }

}

?>