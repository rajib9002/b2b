<?php

class adz extends Controller {

    private $dir = 'adz';

    public function __construct() {
        parent::Controller();
        $this->load->model('mod_adz');
        $this->load->model('mod_home');
    }

    function index($ad_type = 'all', $type_id = 'all', $make_id = 'all', $order_name = '') {
        $con.=' 1';
        $con.= " and bike.bike_status=1 ";
        $this->load->library('pagination');
        $start = $this->uri->segment(7);
        if ($start == '' || !is_numeric($start)) {
            $start = 0;
        }
        $config['uri_segment'] = 7;
        $step = $this->uri->segment(7);
        $config['base_url'] = site_url('adz/index/' . $ad_type . '/' . $type_id . '/' . $order_type . '/' . $order_name . '/');
        $config['total_rows'] = count($this->mod_home->get_bike($con));
        $config['per_page'] = 8;
        $config['num_links'] = 10;
        $config['next_link'] = "&raquo;";
        $config['prev_link'] = "&laquo;";
        $config['page_query_string'] = FALSE;
        $this->pagination->initialize($config);
        $data['pagination_links'] = $this->pagination->create_links();
        $data['rows'] = $this->mod_home->get_bike($con, "limit $start,{$config['per_page']}");
        if (count($data['rows']) > 0) {
            $data['start'] = $start + 1;
        } else {
            $data['start'] = 0;
        }
        $data['end'] = $start + count($data['rows']);
        $data['total'] = $config['total_rows'];
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = $this->dir;
        $data['page_title'] = 'All Bike';
        $data['page'] = 'index';
        $this->load->view('main', $data);
    }

    function copy_img() {
        $i_data = sql::rows("accessories_image");
        foreach ($i_data as $i_data) {
            $img = $i_data['bike_image'];

            rename('../uploads/bike_image/thumbs/t_' . $img, '../uploads/bike_image/thumbs/' . $img);

            //copy('../uploads/bike_image/t_'.$img, '../uploads/bike_image/thumbs/t_'.$img);
            $img = '';
        }
    }

    function adlist($table_name = '', $field_name = '', $field_value = '') {
        $con.="select $table_name.*,type.type_name,make.make_name,model.model_name, area.area_name, country.country_name
               from $table_name
        left join type on type.type_id=$table_name.type_id 
            left join model on model.model_id=$table_name.model_id
                left join make on make.make_id=$table_name.make_id
               left join country on country.country_id=$table_name.country_id
               left join area on area.area_id=$table_name.area_id 
               where $table_name.$field_name='$field_value'  and bike_status=1  order by $table_name.bike_id desc";
        $this->load->library('pagination');
        $start = $this->uri->segment(6);
        if ($start == '' || !is_numeric($start)) {
            $start = 0;
        }
        $config['uri_segment'] = 6;
        $step = $this->uri->segment(6);
        $config['base_url'] = site_url('adz/adlist/' . $table_name . '/' . $field_name . '/' . $field_value . '/');
        $config['total_rows'] = count($this->mod_home->get_bike_seperate($con));
        $config['per_page'] = 8;
        $config['num_links'] = 10;
        $config['next_link'] = "&raquo;";
        $config['prev_link'] = "&laquo;";
        $config['page_query_string'] = FALSE;
        $this->pagination->initialize($config);
        $data['pagination_links'] = $this->pagination->create_links();
        $data['rows'] = $this->mod_home->get_bike_seperate($con, "limit $start,{$config['per_page']}");
        if (count($data['rows']) > 0) {
            $data['start'] = $start + 1;
        } else {
            $data['start'] = 0;
        }
        $data['end'] = $start + count($data['rows']);
        $data['total'] = $config['total_rows'];
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = $this->dir;
        $data['page_title'] = 'All Bike';
        $data['t_name'] = $table_name;
        $data['page'] = 'index';
        $this->load->view('main', $data);
    }

    function catlist($table_name = '') {
        $con.="select $table_name.*,type.type_name,make.make_name,model.model_name, area.area_name, country.country_name
               from $table_name
        left join type on type.type_id=$table_name.type_id 
            left join model on model.model_id=$table_name.model_id
                left join make on make.make_id=$table_name.make_id
               left join country on country.country_id=$table_name.country_id
               left join area on area.area_id=$table_name.area_id
               where $table_name.bike_status=1 order by $table_name.bike_id desc";
        $this->load->library('pagination');
        $start = $this->uri->segment(4);
        if ($start == '' || !is_numeric($start)) {
            $start = 0;
        }
        $config['uri_segment'] = 4;
        $step = $this->uri->segment(4);
        $config['base_url'] = site_url('adz/catlist/' . $table_name . '/');
        $config['total_rows'] = count($this->mod_home->get_bike_seperate($con));
        $config['per_page'] = 8;
        $config['num_links'] = 10;
        $config['next_link'] = "&raquo;";
        $config['prev_link'] = "&laquo;";
        $config['page_query_string'] = FALSE;
        $this->pagination->initialize($config);
        $data['pagination_links'] = $this->pagination->create_links();
        $data['rows'] = $this->mod_home->get_bike_seperate($con, "limit $start,{$config['per_page']}");
        if (count($data['rows']) > 0) {
            $data['start'] = $start + 1;
        } else {
            $data['start'] = 0;
        }
        $data['end'] = $start + count($data['rows']);
        $data['total'] = $config['total_rows'];
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = $this->dir;
        $data['page_title'] = 'All Bike';
        $data['t_name'] = $table_name;
        $data['page'] = 'index';
        $this->load->view('main', $data);
    }

    function all_advertise($ad_type = 'all', $type_id = 'all', $order_type = '', $order_name = '') {
        //echo $ad_type;
        if (!is_numeric($ad_type) && !is_numeric($type_id) && $order_type == '' && $order_name == '') {
            $this->session->unset_userdata('country_id');
            $this->session->unset_userdata('area_id');
            $this->session->unset_userdata('t_id');
            $this->session->unset_userdata('model_id');
            $this->session->unset_userdata('make_id');
        }
        if ($_POST['search']) {
            $start = 0;
            $this->session->unset_userdata('country_id');
            $this->session->unset_userdata('area_id');
            $this->session->unset_userdata('t_id');
            $this->session->unset_userdata('model_id');
            $this->session->unset_userdata('make_id');
            $this->session->set_userdata('country_id', "$_REQUEST[country_id]");
            $this->session->set_userdata('area_id', "$_REQUEST[area_id]");
            $this->session->set_userdata('t_id', "$_REQUEST[type_id]");
            $this->session->set_userdata('model_id', "$_REQUEST[model_id]");
            $this->session->set_userdata('make_id', "$_REQUEST[make_id]");
        }
        $this->session->set_userdata('order_by', "$order");
        $this->session->set_userdata("ad_type", "$ad_type");
        $this->session->set_userdata("type_id", "$type_id");
        $country_id = $this->session->userdata('country_id');
        $area_id = $this->session->userdata('area_id');
        $t_id = $this->session->userdata('t_id');
        $make_id = $this->session->userdata('make_id');
        $model_id = $this->session->userdata('model_id');
        $con.=' 1';
        if (is_numeric($ad_type)) {
            $con.=' and type.type_parent_id=' . $ad_type;
        }
        if (is_numeric($type_id)) {
            $con.=' and bike.type_id=' . $type_id;
        }
        if ($country_id != '') {
            $con.=' and bike.country_id=' . $country_id;
        }
        if ($area_id != '') {
            $con.=' and bike.area_id=' . $area_id;
        }
        if ($make_id != '') {
            $con.=' and bike.make_id=' . $make_id;
        }
        if ($model_id != '' && $model_id != 'Other') {
            $con.=' and bike.model_id=' . $model_id;
        }
        if ($t_id != '') {
            $con.=' and bike.type_id=' . $t_id;
        }
        if ($order_name == '') {
            $order_name = 'bike.bike_id';
        }
        if ($order_type == 'asc') {
            $new_type = 'desc';
        } else if ($order_type == 'desc') {
            $new_type = 'asc';
        } else if ($order_type == '') {
            $order_type = 'desc';
            $new_type = 'desc';
        }
        $this->session->set_userdata("order_type", "$new_type");
        $con.= " and bike.bike_status=1 order by $order_name $order_type ";
        $this->load->library('pagination');
        $start = $this->uri->segment(7);
        if ($start == '' || !is_numeric($start)) {
            $start = 0;
        }
        $config['uri_segment'] = 7;
        $config['base_url'] = site_url('adz/all_advertise/' . $ad_type . '/' . $type_id . '/' . $order_type . '/' . $order_name . '/');
        $config['total_rows'] = count($this->mod_home->get_bike($con));
        $config['per_page'] = 8;
        $data['per_page'] = 8;
        $config['num_links'] = 10;
        $config['next_link'] = "&raquo;";
        $config['prev_link'] = "&laquo;";
        $config['page_query_string'] = FALSE;
        $this->pagination->initialize($config);
        $data['pagination_links'] = $this->pagination->create_links();

        $data['rows'] = $this->mod_home->get_bike($con, "limit $start,{$config['per_page']}");
        if (count($data['rows']) > 0) {
            $data['start'] = $start + 1;
        } else {
            $data['start'] = 0;
        }
        $data['end'] = $start + count($data['rows']);
        $this->session->set_userdata("ajax_start", "$data[start]");
        $this->session->set_userdata("back_page", "all_advertise");
        $data['total'] = $config['total_rows'];
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = $this->dir;
        $data['page'] = 'all_advertise';
        $data['page_title'] = 'All Bike';
        $this->load->view('login_with_top', $data);
    }

    function advanced_search() {
        $data['dir'] = $this->dir;
        $data['page'] = 'advance_search';
        $data['page_banner'] = 'images/all.png';
        $data['page_title'] = 'Advanced Search';
        $data['action'] = 'adz/search_result/';
        $this->load->view('login_with_top', $data);
    }

    function details($table_name = '', $bike_id = '') {
        $this->session->set_userdata('user_url', 'adz/details/' . $table_name . '/' . $bike_id);
        if ($bike_id == '') {
            redirect('adz');
        }
        if ($_POST['submit']) {
            $this->mod_adz->save_comment($table_name, $bike_id);
            redirect('adz/details/' . $table_name . '/' . $bike_id);
        }
        $data['details_row'] = $this->mod_home->get_bike_details($table_name, $bike_id);
        $tab_name = $table_name . '_comment';
        $data['bike_comment'] = sql::rows("$tab_name", "bike_id=$bike_id");
        $view_info = sql::row("$table_name", "bike_id=$bike_id", 'views');
        $new_views = $view_info['views'] + 1;
        $this->db->query("update $table_name set views=$new_views where bike_id='$bike_id'");
        $data['dir'] = $this->dir;
        $data['page'] = 'details';
        $data['t_name'] = $table_name;
        $data['action'] = "adz/details/" . $table_name . '/' . $bike_id;
        $data['msg'] = $this->session->flashdata('msg');
        $data['page_title'] = 'Bike Details';
        $this->load->view("main", $data);
    }

    function save_list() {
        if (!common::is_logged_in()) {
            redirect('login');
        }
        $user_id = $this->session->userdata('user_id');
        if ($user_id != '') {
            $data['rows'] = $this->mod_home->get_save_bike($user_id);
        }
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = $this->dir;
        $data['page'] = 'save_ads';
        $this->session->set_userdata('back_page', "save_ads");
        $data['page_banner'] = 'images/about_us.png';
        $data['page_title'] = 'All bike';
        $this->load->view('login_with_top', $data);
    }

    function my_ads() {
        if (!common::is_logged_in()) {
            $this->session->set_userdata('user_url', 'adz/my_ads');
            redirect('login');
        }
//        $this->load->library('pagination');
//        $start = $this->uri->segment(3);
//        $con = 1;
//        if (!is_numeric($start)) {
//            $start = 0;
//        }
//        $config['uri_segment'] = 3;
//        $config['base_url'] = site_url('adz/my_ads');
//        
//        $config['total_rows'] = count($this->mod_home->get_save_bike($user_id));
//        $config['num_links'] = 10;
//        $config['per_page'] = 8;
//        $config['next_link'] = "&raquo;";
//        $config['prev_link'] = "&laquo;";
//        $config['page_query_string'] = false;
//        $this->pagination->initialize($config);
//        $data['pagination_links'] = $this->pagination->create_links();
//        if ($user_id != '') {
//            $data['rows'] = $this->mod_home->get_my_bike($user_id);
//            $data['save_rows'] = $this->mod_home->get_save_bike($user_id, $limit = true, $start, $config['per_page']);
//        }
//        if (count($data['save_rows']) > 0) {
//            $data['start'] = $start + 1;
//        } else {
//            $data['start'] = 0;
//        }
//        $data['end'] = $start + count($data['save_rows']);
//        $data['total'] = $config['total_rows'];
//        $this->session->set_userdata("back_page", "my_ads");



        $user_id = $this->session->userdata('user_id');
        $data['msg'] = $this->session->flashdata('msg');
        $data['main_cat'] = sql::rows("main_type");
        $data['dir'] = $this->dir;
        $data['page'] = 'my_ads';
        $data['page_title'] = 'My Ad';
        $this->load->view('main', $data);
    }

    function search_result() {
        //if (!common::is_logged_in()) {
        //    $this->session->set_userdata('user_url', 'adz/my_ads');
        //    redirect('login');
        //}
        $data['msg'] = $this->session->flashdata('msg');
        $data['main_cat'] = sql::rows("main_type");
        $data['dir'] = $this->dir;
        $data['page'] = 'search_result';
        $data['page_title'] = 'search Result';
        $this->load->view('main', $data);
    }

    function add_adz() {
        if (!common::is_logged_in()) {
            redirect('login/adz_login_page');
        }
        if ($_POST['save']) {
            if ($this->form_validation->run('valid_adz')) {
                $table_name_data = sql::row("main_type", "main_type_id='$_POST[main_type_id]'");
                $table_name = $table_name_data['table_name'];
                $this->session->set_userdata('table_name', "$table_name");
                $this->session->set_userdata('type_id_new', "$_POST[type_id_new]");
                $this->session->set_userdata('parent_type_id', "$_POST[main_type_id]");
                $this->session->set_userdata('ad_type', "$_POST[ad_type]");
                $this->session->set_userdata('seller_type', "$_POST[seller_type]");
                $this->session->set_userdata('ad_title', "$_POST[ad_title]");
                $this->session->set_userdata($_POST);
                redirect('adz/step3');
            }
        }
        $data['session_array'] = $this->session->all_userdata();
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = $this->dir;
        $data['action'] = 'adz/add_adz';
        $data['page'] = 'ad_step1';
        $data['page_title'] = "Add New Bike";
        $this->load->view('login_with_top', $data);
    }

    function step2() {
        if (!common::is_logged_in()) {
            redirect('login/adz_login_page');
        }
        if ($_POST['save']) {
            $this->session->set_userdata('parent_type_id', "$_POST[parent_id]");
            redirect('adz/step3');
        }
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = $this->dir;
        $data['action'] = 'adz/step2';
        $data['page'] = 'ad_step2';
        $data['page_title'] = "Add New Bike";
        $this->load->view('login_with_top', $data);
    }

    function step3() {
        if (!common::is_logged_in()) {
            redirect('login/adz_login_page');
        }
        $parent_id_des = $this->session->userdata('parent_type_id');

        $is_des = sql::row('type', "type_id=$parent_id_des", "description_type");
        if ($is_des['description_type'] == 0) {
            if ($_POST['save']) {
                if ($this->form_validation->run('valid_adz_step3')) {
                    $this->session->set_userdata($_POST);
                    redirect('adz/general_info');
                }
            }
            $data['session_array'] = $this->session->all_userdata();
            $data['msg'] = $this->session->flashdata('msg');
            $data['dir'] = $this->dir;
            $data['page_banner'] = 'add_place';
            $data['action'] = 'adz/step3';
            $data['page'] = 'ad_step3';
            $data['page_title'] = "Add New Bike";
            $this->load->view('login_with_top', $data);
        }

        if ($is_des['description_type'] == 1) {
            if ($_POST['save_description']) {
                if ($this->form_validation->run('valid_adz_step3_description')) {
                    $this->session->set_userdata($_POST);
                    redirect('adz/general_info');
                }
            }
            $data['session_array'] = $this->session->all_userdata();
            $data['msg'] = $this->session->flashdata('msg');
            $data['dir'] = $this->dir;
            $data['page_banner'] = 'add_place';
            $data['action'] = 'adz/step3';
            $data['page'] = 'ad_step3_description';
            $data['page_title'] = "Add New Bike";
            $this->load->view('login_with_top', $data);
        }
    }

    function general_info() {
        if (!common::is_logged_in()) {
            redirect('login/adz_login_page');
        }
        if ($_POST['save']) {
            if ($this->form_validation->run('valid_general_info')) {
                $this->session->set_userdata($_POST);
                redirect('adz/step4');
            }
        }
        $data['session_array'] = $this->session->all_userdata();
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = $this->dir;
        $data['action'] = 'adz/general_info';
        $data['page'] = 'general_info';
        $data['page_title'] = "Add New Bike";
        $this->load->view('login_with_top', $data);
    }

    function step4_thumb() {
        if (isset($_POST['submit'])) {
            $j = 0;
            $session_id = $this->session->userdata('session_id');
            $this->db->query("delete from bike_image where session_id='$session_id' and bike_id=0");
            for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
                $single_iamge = $_FILES['file']['name'][$i];
                if ($single_iamge != "") {
                    $image_name = $this->mod_adz->add_file($single_iamge, $i);
                    if ($image_name != '') {
                        $session_id = $this->session->userdata('session_id');
                        $this->db->query("insert into bike_image set bike_image='$image_name',session_id='$session_id',bike_id=0");
                    }
                }
            }
            $bike_id = $this->mod_adz->save_bike_video();
            $this->session->set_userdata('bike_id', "$bike_id");
            $session_id = $this->session->userdata('session_id');
            $this->db->query("update bike_image set bike_id='$bike_id' where bike_id=0 and session_id='$session_id'");
            $this->session->set_userdata($_POST);
            redirect('adz/step6');
        }
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = $this->dir;
        $data['page_banner'] = 'add_place';
        $data['action'] = 'adz/step4';
        $data['page'] = 'ad_step4';
        $data['page_title'] = "Add New Bike";
        $this->load->view('login_with_top', $data);
    }

//    function step4() {
//        if (!common::is_logged_in()) {
//            redirect('login/adz_login_page');
//        }
//        if (isset($_POST['submit'])) {
//            $file0 = 'file0';
//            if ($_FILES[$file0]['name'] != '') {
//                $file0 = $this->mod_adz->add_image($file0);
//                $this->session->set_userdata('file0', "$file0");
//            }
//            $file1 = 'file1';
//            if ($_FILES[$file1]['name'] != '') {
//                $file1 = $this->mod_adz->add_image($file1);
//                $this->session->set_userdata('file1', "$file1");
//            }
//
//            $file2 = 'file2';
//            if ($_FILES[$file2]['name'] != '') {
//                $file2 = $this->mod_adz->add_image($file2);
//                $this->session->set_userdata('file2', "$file2");
//            }
//
//            $file3 = 'file3';
//            if ($_FILES[$file3]['name'] != '') {
//                $file3 = $this->mod_adz->add_image($file3);
//                $this->session->set_userdata('file3', "$file3");
//            }
//
//            $file4 = 'file4';
//            if ($_FILES[$file4]['name'] != '') {
//                $file4 = $this->mod_adz->add_image($file4);
//                $this->session->set_userdata('file4', "$file4");
//            }
//
//            $file5 = 'file5';
//            if ($_FILES[$file5]['name'] != '') {
//                $file5 = $this->mod_adz->add_image($file5);
//                $this->session->set_userdata('file5', "$file5");
//            }
//            $this->session->set_userdata($_POST);
//            redirect('adz/step6');
//        }
//        $data['msg'] = $this->session->flashdata('msg');
//        $data['dir'] = $this->dir;
//        $data['action'] = 'adz/step4';
//        $data['page'] = 'ad_step4';
//        $data['page_title'] = "Add New Bike";
//        $this->load->view('login_with_top', $data);
//    }



    function step4() {


        if (isset($_POST['submit'])) {
            $max_file_size = 10240 * 10240; // 250kb   // now is 10MB
            $valid_exts = array('jpeg', 'jpg', 'png', 'gif');
            $sizes = array(350 => 350);//1000 => 1000,
            if (isset($_FILES['file0'])) {
                $ext = strtolower(pathinfo($_FILES['file0']['name'], PATHINFO_EXTENSION));
                if (in_array($ext, $valid_exts)) {
                    foreach ($sizes as $w => $h) {
                        $files[] = $this->mod_adz->resize0($w, $h);
                    }
                } else {
                    $msg = 'Unsupported file';
                }
            }

            if (isset($_FILES['file1'])) {
                $ext = strtolower(pathinfo($_FILES['file1']['name'], PATHINFO_EXTENSION));
                if (in_array($ext, $valid_exts)) {
                    foreach ($sizes as $w => $h) {
                        $files[] = $this->mod_adz->resize1($w, $h);
                    }
                } else {
                    $msg = 'Unsupported file';
                }
            }


            if (isset($_FILES['file2'])) {
                $ext = strtolower(pathinfo($_FILES['file2']['name'], PATHINFO_EXTENSION));
                if (in_array($ext, $valid_exts)) {
                    foreach ($sizes as $w => $h) {
                        $files[] = $this->mod_adz->resize2($w, $h);
                    }
                } else {
                    $msg = 'Unsupported file';
                }
            }

            if (isset($_FILES['file3'])) {
                $ext = strtolower(pathinfo($_FILES['file3']['name'], PATHINFO_EXTENSION));
                if (in_array($ext, $valid_exts)) {
                    foreach ($sizes as $w => $h) {
                        $files[] = $this->mod_adz->resize3($w, $h);
                    }
                } else {
                    $msg = 'Unsupported file';
                }
            }

            if (isset($_FILES['file4'])) {
                $ext = strtolower(pathinfo($_FILES['file4']['name'], PATHINFO_EXTENSION));
                if (in_array($ext, $valid_exts)) {
                    foreach ($sizes as $w => $h) {
                        $files[] = $this->mod_adz->resize4($w, $h);
                    }
                } else {
                    $msg = 'Unsupported file';
                }
            }
            if (isset($_FILES['file5'])) {
                $ext = strtolower(pathinfo($_FILES['file5']['name'], PATHINFO_EXTENSION));
                if (in_array($ext, $valid_exts)) {
                    foreach ($sizes as $w => $h) {
                        $files[] = $this->mod_adz->resize5($w, $h);
                    }
                } else {
                    $msg = 'Unsupported file';
                }
            }



            $this->session->set_userdata($_POST);
            redirect('adz/step6');
        }



//        ini_set('memory_limit', '-1');
//        if (isset($_POST['submit'])) {
//            if ($_FILES[file0]['name'] != '') {
//                $target_path = "../uploads/bike_image/";
//                $validextensions = array("jpeg", "jpg", "png");
//                $random_digit = rand(0000, 9999);
//                $file = $random_digit . '_' . str_replace(' ', '_', $_FILES['file0']['name']);
//                $target_path = $target_path . basename($file);
//                $j = $j + 1;
//                if (($_FILES["file0"]["size"] < 5000000000)) {
//                    $name = $_FILES['file0']['name'];
//                    if (move_uploaded_file($_FILES['file0']['tmp_name'], $target_path)) {
//                        $this->createThumbnail($file);
//                    } else {
//                        echo $j . ').<span id="error">please try again!.</span><br/><br/>';
//                    }
//                } else {
//                    echo $j . ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
//                }
//                $target_path = "../uploads/bike_image/";
//
//                $this->session->set_userdata('file0', "$file");
//            }
//
//            $file1 = 'file1';
//            if ($_FILES[file1]['name'] != '') {
//
//                $target_path = "../uploads/bike_image/";
//                $validextensions = array("jpeg", "jpg", "png");
//                $random_digit = rand(0000, 9999);
//                $file = $random_digit . '_' . str_replace(' ', '_', $_FILES['file1']['name']);
//                $target_path = $target_path . basename($file);
//                $j = $j + 1;
//                if (($_FILES["file1"]["size"] < 5000000000)) {
//                    $name = $_FILES['file1']['name'];
//                    if (move_uploaded_file($_FILES['file1']['tmp_name'], $target_path)) {
//                        $this->createThumbnail($file);
//                    } else {
//                        echo $j . ').<span id="error">please try again!.</span><br/><br/>';
//                    }
//                } else {
//                    echo $j . ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
//                }
//                $target_path = "../uploads/bike_image/";
//
//                $this->session->set_userdata('file1', "$file");
//            }
//
//            $file2 = 'file2';
//            if ($_FILES[file2]['name'] != '') {
//
//                $target_path = "../uploads/bike_image/";
//                $validextensions = array("jpeg", "jpg", "png");
//                $random_digit = rand(0000, 9999);
//                $file = $random_digit . '_' . str_replace(' ', '_', $_FILES['file2']['name']);
//                $target_path = $target_path . basename($file);
//                $j = $j + 1;
//                if (($_FILES["file2"]["size"] < 5000000000)) {
//                    $name = $_FILES['file2']['name'];
//                    if (move_uploaded_file($_FILES['file2']['tmp_name'], $target_path)) {
//                        $this->createThumbnail($file);
//                    } else {
//                        echo $j . ').<span id="error">please try again!.</span><br/><br/>';
//                    }
//                } else {
//                    echo $j . ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
//                }
//                $target_path = "../uploads/bike_image/";
//
//
//
//                $this->session->set_userdata('file2', "$file");
//            }
//
//            $file3 = 'file3';
//            if ($_FILES[file3]['name'] != '') {
//
//                $target_path = "../uploads/bike_image/";
//                $validextensions = array("jpeg", "jpg", "png");
//                $random_digit = rand(0000, 9999);
//                $file = $random_digit . '_' . str_replace(' ', '_', $_FILES['file3']['name']);
//                $target_path = $target_path . basename($file);
//                $j = $j + 1;
//                if (($_FILES["file3"]["size"] < 5000000000)) {
//                    $name = $_FILES['file3']['name'];
//                    if (move_uploaded_file($_FILES['file3']['tmp_name'], $target_path)) {
//                        $this->createThumbnail($file);
//                    } else {
//                        echo $j . ').<span id="error">please try again!.</span><br/><br/>';
//                    }
//                } else {
//                    echo $j . ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
//                }
//                $target_path = "../uploads/bike_image/";
//
//
//                $this->session->set_userdata('file3', "$file");
//            }
//
//            $file4 = 'file4';
//            if ($_FILES[file4]['name'] != '') {
//
//                $target_path = "../uploads/bike_image/";
//                $validextensions = array("jpeg", "jpg", "png");
//                $random_digit = rand(0000, 9999);
//                $file = $random_digit . '_' . str_replace(' ', '_', $_FILES['file4']['name']);
//                $target_path = $target_path . basename($file);
//                $j = $j + 1;
//                if (($_FILES["file4"]["size"] < 5000000000)) {
//                    $name = $_FILES['file4']['name'];
//                    if (move_uploaded_file($_FILES['file4']['tmp_name'], $target_path)) {
//                        $this->createThumbnail($file);
//                    } else {
//                        echo $j . ').<span id="error">please try again!.</span><br/><br/>';
//                    }
//                } else {
//                    echo $j . ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
//                }
//                $target_path = "../uploads/bike_image/";
//
//
//                $this->session->set_userdata('file4', "$file");
//            }
//
//            $file5 = 'file5';
//            if ($_FILES[file5]['name'] != '') {
//
//                $target_path = "../uploads/bike_image/";
//                $validextensions = array("jpeg", "jpg", "png");
//                $random_digit = rand(0000, 9999);
//                $file = $random_digit . '_' . str_replace(' ', '_', $_FILES['file5']['name']);
//                $target_path = $target_path . basename($file);
//                $j = $j + 1;
//                if (($_FILES["file5"]["size"] < 5000000000)) {
//                    $name = $_FILES['file5']['name'];
//                    if (move_uploaded_file($_FILES['file5']['tmp_name'], $target_path)) {
//                        $this->createThumbnail($file);
//                    } else {
//                        echo $j . ').<span id="error">please try again!.</span><br/><br/>';
//                    }
//                } else {
//                    echo $j . ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
//                }
//                $target_path = "../uploads/bike_image/";
//                $this->session->set_userdata('file5', "$file");
//            }
        //  $this->session->set_userdata($_POST);
        //   redirect('adz/step6');
        //}
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = $this->dir;
        $data['action'] = 'adz/step4';
        $data['page'] = 'ad_step4';
        $data['page_title'] = "Add New Bike";
        $this->load->view('login_with_top', $data);
    }

    function step5() {
        if (!common::is_logged_in()) {
            redirect('login/adz_login_page');
        }
        if ($_POST['save']) {
            if ($this->form_validation->run('valid_adz_step5')) {

                $this->session->set_userdata("adz_poster_email", "$_POST[seller_email]");

                $this->session->set_userdata($_POST);
                redirect('adz/step6');
            }
        }
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = $this->dir;
        $data['action'] = 'adz/step5';
        $data['page'] = 'ad_step5';
        $data['page_title'] = "Add New Bike";
        $this->load->view('main', $data);
    }

    function step6() {
        if (!common::is_logged_in()) {
            redirect('login/adz_login_page');
        }
        if ($_POST['save']) {
            if ($this->form_validation->run('valid_adz_step6')) {
                $this->session->set_userdata("adz_poster_email", "$_POST[seller_email]");
                $this->session->set_userdata("adz_poster_name", "$_POST[seller_name]");
                $this->session->set_userdata("adz_poster_phone", "$_POST[seller_phone]");
                $this->session->set_userdata($_POST);
                redirect('adz/confirm');
            }
        }
        $data['session_array'] = $this->session->all_userdata();
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = $this->dir;
        $data['action'] = 'adz/step6';
        $data['page'] = 'ad_step6';
        $data['page_title'] = "Add New Bike";
        $this->load->view('login_with_top', $data);
    }

    function confirm() {
        if (!common::is_logged_in()) {
            redirect('login/adz_login_page');
        }
        $session_array = $this->session->all_userdata();
        if ($_POST['confirm']) {
            $this->mod_adz->save_bike_ad();
            redirect('adz/success');
        }
        $bike_id = $this->session->userdata('bike_insert_id');
        $data['bike_id'] = $this->session->userdata('bike_insert_id');
        $data['session_array'] = $this->session->all_userdata();
        $data['page_title'] = 'Confirm Ad';
        $data['dir'] = 'adz';
        $data['page'] = 'confirm';
        $this->load->view("login_with_top", $data);
    }

//    function createThumbnail($filename) {
//        ini_set('memory_limit', '-1');
//        $final_width_of_image = 450;
//        $path_to_image_directory = '../uploads/bike_image/';
//        $path_to_thumbs_directory = '../uploads/bike_image/thumbs/';
//
//        if (preg_match('/[.](jpg)$/', $filename)) {
//            $im = imagecreatefromjpeg($path_to_image_directory . $filename);
//        } else if (preg_match('/[.](gif)$/', $filename)) {
//            $im = imagecreatefromgif($path_to_image_directory . $filename);
//        } else if (preg_match('/[.](jpeg)$/', $filename)) {
//            $im = imagecreatefromjpeg($path_to_image_directory . $filename);
//        } else if (preg_match('/[.](png)$/', $filename)) {
//            $im = imagecreatefrompng($path_to_image_directory . $filename);
//        }
//
//        $ox = imagesx($im);
//        $oy = imagesy($im);
//
//        $nx = $final_width_of_image;
//        $ny = floor($oy * ($final_width_of_image / $ox));
//
//        $nm = imagecreatetruecolor($nx, $ny);
//
//        imagecopyresized($nm, $im, 0, 0, 0, 0, $nx, $ny, $ox, $oy);
//
//        if (!file_exists($path_to_thumbs_directory)) {
//            if (!mkdir($path_to_thumbs_directory)) {
//                die("There was a problem. Please try again!");
//            }
//        }
//
//        imagejpeg($nm, $path_to_thumbs_directory . $filename);
//        $tn = '<img src="' . $path_to_thumbs_directory . $filename . '" alt="image" />';
//        $tn .= '<br />Congratulations. Your file has been successfully uploaded, and a      thumbnail has been created.';
//    }
//
//    function createLarge($filename) {
//        ini_set('memory_limit', '-1');
//
//        $final_width_of_image = 1200;
//        $path_to_image_directory = '../uploads/bike_image/';
//        $path_to_thumbs_directory = '../uploads/bike_image/large/';
//
//        if (preg_match('/[.](jpg)$/', $filename)) {
//            $im = imagecreatefromjpeg($path_to_image_directory . $filename);
//        } else if (preg_match('/[.](gif)$/', $filename)) {
//            $im = imagecreatefromgif($path_to_image_directory . $filename);
//        } else if (preg_match('/[.](png)$/', $filename)) {
//            $im = imagecreatefrompng($path_to_image_directory . $filename);
//        }
//
//        $ox = imagesx($im);
//        $oy = imagesy($im);
//
//        $nx = $final_width_of_image;
//        $ny = floor($oy * ($final_width_of_image / $ox));
//
//        $nm = imagecreatetruecolor($nx, $ny);
//
//        imagecopyresized($nm, $im, 0, 0, 0, 0, $nx, $ny, $ox, $oy);
//
//        if (!file_exists($path_to_thumbs_directory)) {
//            if (!mkdir($path_to_thumbs_directory)) {
//                die("There was a problem. Please try again!");
//            }
//        }
//
//        imagejpeg($nm, $path_to_thumbs_directory . $filename);
//        $tn = '<img src="' . $path_to_thumbs_directory . $filename . '" alt="image" />';
//        $tn .= '<br />Congratulations. Your file has been successfully uploaded, and a      thumbnail has been created.';
//        //echo $tn;
//    }




    function createThumbnail($filename) {
        ini_set('memory_limit', '-1');
        $final_width_of_image = 450;
        $path_to_image_directory = '../uploads/bike_image/';
        $path_to_thumbs_directory = '../uploads/bike_image/thumbs/';

        if (preg_match('/[.](jpg)$/', $filename)) {
            $im = imagecreatefromjpeg($path_to_image_directory . $filename);
        } else if (preg_match('/[.](gif)$/', $filename)) {
            $im = imagecreatefromgif($path_to_image_directory . $filename);
        } else if (preg_match('/[.](jpeg)$/', $filename)) {
            $im = imagecreatefromjpeg($path_to_image_directory . $filename);
        } else if (preg_match('/[.](png)$/', $filename)) {
            $im = imagecreatefrompng($path_to_image_directory . $filename);
        }

        $ox = imagesx($im);
        $oy = imagesy($im);

        $nx = $final_width_of_image;
        $ny = floor($oy * ($final_width_of_image / $ox));

        $nm = imagecreatetruecolor($nx, $ny);

        imagecopyresized($nm, $im, 0, 0, 0, 0, $nx, $ny, $ox, $oy);

        if (!file_exists($path_to_thumbs_directory)) {
            if (!mkdir($path_to_thumbs_directory)) {
                die("There was a problem. Please try again!");
            }
        }

        imagejpeg($nm, $path_to_thumbs_directory . $filename);
        $tn = '<img src="' . $path_to_thumbs_directory . $filename . '" alt="image" />';
        $tn .= '<br />Congratulations. Your file has been successfully uploaded, and a      thumbnail has been created.';
        //echo $tn;
    }

    function createLarge($filename) {
        ini_set('memory_limit', '-1');

        $final_width_of_image = 1200;
        $path_to_image_directory = '../uploads/bike_image/';
        $path_to_thumbs_directory = '../uploads/bike_image/large/';

        if (preg_match('/[.](jpg)$/', $filename)) {
            $im = imagecreatefromjpeg($path_to_image_directory . $filename);
        } else if (preg_match('/[.](gif)$/', $filename)) {
            $im = imagecreatefromgif($path_to_image_directory . $filename);
        } else if (preg_match('/[.](png)$/', $filename)) {
            $im = imagecreatefrompng($path_to_image_directory . $filename);
        }

        $ox = imagesx($im);
        $oy = imagesy($im);

        $nx = $final_width_of_image;
        $ny = floor($oy * ($final_width_of_image / $ox));

        $nm = imagecreatetruecolor($nx, $ny);

        imagecopyresized($nm, $im, 0, 0, 0, 0, $nx, $ny, $ox, $oy);

        if (!file_exists($path_to_thumbs_directory)) {
            if (!mkdir($path_to_thumbs_directory)) {
                die("There was a problem. Please try again!");
            }
        }

        imagejpeg($nm, $path_to_thumbs_directory . $filename);
        $tn = '<img src="' . $path_to_thumbs_directory . $filename . '" alt="image" />';
        $tn .= '<br />Congratulations. Your file has been successfully uploaded, and a      thumbnail has been created.';
        //echo $tn;
    }

    function success() {
        if (!common::is_logged_in()) {
            redirect('login/adz_login_page');
        }
        $this->session->unset_userdata('bike_insert_id');
        $data['msg'] = "Successful";
        $data['page_title'] = 'Add Successful';
        $data['page_banner'] = 'add_place';
        $data['dir'] = 'adz';
        $data['page'] = 'success';
        $this->load->view("login_with_top", $data);
    }

    function is_valid_user() {
        if (sql::count("users", "user_name='{$_POST['user_name']}'") > 0) {
            $this->form_validation->set_message('is_valid_user', "The User Name is already Used! Try another.");
            return false;
        } else {
            return true;
        }
    }

    function edit_adz($bike_id = '') {
        if (!common::is_logged_in()) {
            $this->session->set_userdata('user_url', 'adz/edit_adz');
            redirect('login');
        }
        $data = sql::row("bike", "bike_id=$bike_id");
        $data['bike_image'] = sql::rows("bike_image", "bike_id=$bike_id");
        if ($_POST['save']) {
            if ($this->form_validation->run('valid_adz')) {
                $this->mod_adz->update_bike_ad($bike_id);
                $this->mod_adz->save_bike_image($bike_id);
                $this->session->set_flashdata('msg', 'Your Ad Has Been Updated Successfully!');
                redirect('adz/success');
            }
        }

        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = $this->dir;
        $data['page_banner'] = 'images/about_us.png';
        $data['action'] = 'adz/edit_adz/' . $bike_id;
        $data['page'] = 'edit_form';
        $data['page_title'] = "Edit Your Bike";
        $this->load->view('main', $data);
    }

    function delete_adz($bike_id = '', $table_name = '') {
        if (!common::is_logged_in()) {
            redirect('login');
        }
        if ($bike_id == '') {
            redirect('adz/my_ads');
        }

//        $all_image = sql::rows('bike_image', "bike_id=$bike_id");
//        foreach ($all_image as $file) {
//            @unlink(UPLOAD_PATH . "bike_image/" . $file['bike_image']);
//            @unlink(UPLOAD_PATH . "bike_image/thumbs/" . $file['bike_image']);
//            @unlink(UPLOAD_PATH . "bike_image/large/" . $file['bike_image']);
//        }

        $tab_name = $table_name . '_image';
        $tab_comment = $table_name . '_comment';

        sql::delete("$table_name", "bike_id='$bike_id'");
        sql::delete("$tab_name", 'bike_id=' . $bike_id);
        sql::delete("$tab_comment", 'bike_id=' . $bike_id);
        //sql::delete('save_ad', 'bike_id=' . $bike_id);
        $this->session->set_flashdata('msg', 'Successfully Deleted!!!');
        redirect('adz/my_ads');
    }

    function bike_sold_status($bike_id = '', $status = 1) {
        if ($bike_id == '') {
            redirect('adz/my_ads');
        }
        $data = array('bike_sold_status' => $status);
        $this->db->update('bike', $data, array('bike_id' => $bike_id));
        $this->session->set_flashdata('msg', 'Status Updated!!!');
        redirect('adz/my_ads');
    }

    function save_adz($bike_id = '') {
        $user_id = $this->session->userdata('user_id');
        if ($user_id == '') {
            $this->session->set_flashdata('msg', 'Please Login First to Save this Ad');
            redirect('adz/details/' . $bike_id);
        } elseif ($user_id != '') {
            if (sql::count('save_ad', "bike_id=$bike_id and user_id=$user_id") > 0) {
                $this->session->set_flashdata('msg', 'This Ad Already Added in Your Save List');
                redirect('adz/details/' . $bike_id);
            }
            $this->mod_adz->add_save_adz($bike_id, $user_id);
            $this->session->set_flashdata('msg', 'Sucessfully add in Your Save List');
            redirect('adz/details/' . $bike_id);
        }
    }

    function user_email_check() {
        $str = $_POST['user_email'];
        if (sql::count('users', "user_email='$str'") > 0) {
            $this->form_validation->set_message('user_email_check', 'Your Email is already Registered for a User ');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function user_name_check() {
        $str = $_POST['user_name'];
        if (sql::count('users', "user_name='$str'") > 0) {
            $this->form_validation->set_message('user_name_check', 'User Already Exists Try Another User Name');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function get_area() {
        echo $this->mod_adz->get_area_options($_POST['country_id']);
    }

    function get_make() {
        echo $this->mod_adz->get_make_options($_POST['type_id']);
    }

    function get_model() {
        echo $this->mod_adz->get_model_options($_POST['make_id']);
    }

    function get_image() {
        $file = $_POST['image'];
        if ($_FILES[$file]['name'] != '') {
            $image = $this->mod_adz->add_image($file);
            echo $image;
        }
    }

//    function edit_my_adz($bike_id = '') {
//        if ($bike_id == '') {
//            redirect('adz/my_ads');
//        }
//        if ($_POST['update']) {
//            if ($this->form_validation->run('valid_adz_update')) {
//                $this->mod_adz->update_my_bike_ad($bike_id);
//                $this->session->set_flashdata('msg', 'Successfully Updated!!!');
//                redirect('adz/my_ads');
//            }
//        }
//        $data['bike_id'] = $bike_id;
//        $data['b'] = sql::row("bike", "bike_id=$bike_id");
//        $data['msg'] = $this->session->flashdata('msg');
//        $data['dir'] = $this->dir;
//        $data['page'] = 'edit_form';
//        $data['page_title'] = 'Edit My Ads';
//
//        $this->load->view('main_contact', $data);
//    }


    function edit_my_adz($table_name = '', $bike_id = '') {
        if ($bike_id == '') {
            redirect('adz/my_ads');
        }
        if ($_POST['update']) {
            if ($this->form_validation->run('valid_adz_update')) {
                $this->mod_adz->update_my_bike_ad($table_name, $bike_id);
                $this->session->set_flashdata('msg', 'Successfully Updated!!!');
                redirect('adz/my_ads');
            }
        }
        $data['bike_id'] = $bike_id;
        $data['t_name'] = $table_name;
        $data['b'] = sql::row("$table_name", "bike_id=$bike_id");
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = $this->dir;
        $data['page'] = 'edit_form';
        $data['page_title'] = 'Edit My Ads';

        $this->load->view('main', $data);
    }

    function delete_save_adz($bike_id = '') {
        if ($bike_id == '') {
            redirect('adz/save_list');
        }
        $user_id = $this->session->userdata('user_id');
        sql::delete('save_ad', "bike_id=$bike_id and user_id=$user_id");
        $this->session->set_flashdata('msg', 'Successfully Deleted!!!');
        redirect('adz/save_list');
    }

    function blog_description($id = '') {
        $user_id = $this->session->userdata('user_id');
        $data['blog_detail'] = sql::row("blogs", "blog_id=$id");
        $this->db->query("update blogs set blog_view=blog_view+1 where blog_id='$id'");
        if ($_POST['submit']) {
            $this->blog_model->save_comment($id);
            redirect('blog/blog_description/' . $id);
        }

        if ($_POST['edit']) {

            redirect('blog/edit_blog/' . $id);
        }

        $data['blog_comment'] = sql::rows("blog_comment", "blog_id=$id");
        if ($_POST['remove']) {

            if ($data['blog_detail']['user_id'] == $user_id) {
                sql::delete("blogs", "blog_id=$id");
                sql::delete("blog_comment", "blog_id=$id");
            }

            redirect("blog");
        }
        $data['dir'] = 'blog';
        $data['page_title'] = "Blog Description";
        $data['action'] = "blog/blog_description/" . $id;
        $data['page'] = 'blog_description';
        $this->load->view("main_design", $data);
    }

    function delete_comment($bike_id = '', $comment_id = '', $t_name = '') {
        if (!common::is_logged_in()) {
            common::redirect();
        }
        $table_name = $t_name . '_comment';

        sql::delete("$table_name", "id=$comment_id");
        redirect('adz/details/' . $t_name . '/' . $bike_id);
    }

    function load_new_type() {
        $main_t_id = $_POST['main_t_id'];
        $rows = sql::rows("type", "type_status =1 and main_type_id='$main_t_id'");
        $opt = "<option value=''>Select Type</option>";
        if (count($rows) > 0) {
            foreach ($rows as $row) {
                $opt.="<option value='$row[type_id]'>$row[type_name]</option>";
            }
        }
        echo $opt;
    }

}

?>