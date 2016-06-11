<?php

class adz extends Controller {

    private $dir = 'adz';

    public function __construct() {
        parent::Controller();
        $this->load->model('mod_adz');
        $this->load->model('mod_home');
    }

    function index($ad_type = 'all', $type_id = 'all', $order_type = '', $order_name = '') {
        if ((!is_numeric($ad_type) && !is_numeric($type_id) && $order_type == '' && $order_name == '') || (is_numeric($ad_type) && !is_numeric($type_id) && $order_type == '' && $order_name == '')) {
            $this->session->unset_userdata('ad_type_ad');
            $this->session->unset_userdata('seller_type_ad');
            $this->session->unset_userdata('country_id_ad');
            $this->session->unset_userdata('area_id_ad');
            $this->session->unset_userdata('type_id_ad');
            $this->session->unset_userdata('company_id_ad');
            $this->session->unset_userdata('model_id_ad');
            $this->session->unset_userdata('post_code');
            $this->session->unset_userdata('from_price');
            $this->session->unset_userdata('to_price');
            $this->session->unset_userdata('from_mileage');
            $this->session->unset_userdata('to_mileage');
            $this->session->unset_userdata('from_hours');
            $this->session->unset_userdata('to_hours');
            $this->session->unset_userdata('from_engine');
            $this->session->unset_userdata('to_engine');
            $this->session->unset_userdata('from_year');
            $this->session->unset_userdata('to_year');
            $this->session->unset_userdata('type_id_top');
            $this->session->unset_userdata('search_text');
        }
        if ($_POST['top_search']) {
            $start = 0;
            $this->session->set_userdata('type_id_top', "$_REQUEST[type_id_top]");
            $this->session->set_userdata('search_text', "$_REQUEST[search_text]");
            $this->session->set_userdata('top_search', TRUE);
        }

        if ($_POST['advanced_search']) {
            $start = 0;
            $this->session->set_userdata('ad_type_ad', "$_REQUEST[ad_type_ad]");
            $this->session->set_userdata('seller_type_ad', "$_REQUEST[seller_type_ad]");
            $this->session->set_userdata('country_id_ad', "$_REQUEST[country_id_ad]");
            $this->session->set_userdata('area_id_ad', "$_REQUEST[area_id_ad]");
            $this->session->set_userdata('type_id_ad', "$_REQUEST[type_id_ad]");
            $this->session->set_userdata('company_id_ad', "$_REQUEST[company_id_ad]");
            $this->session->set_userdata('model_id_ad', "$_REQUEST[model_id_ad]");
            $this->session->set_userdata('post_code', "$_REQUEST[post_code]");
            $this->session->set_userdata('from_price', "$_REQUEST[from_price]");
            $this->session->set_userdata('to_price', "$_REQUEST[to_price]");
            $this->session->set_userdata('from_mileage', "$_REQUEST[from_mileage]");
            $this->session->set_userdata('to_mileage', "$_REQUEST[to_mileage]");
            $this->session->set_userdata('from_hours', "$_REQUEST[from_hours]");
            $this->session->set_userdata('to_hours', "$_REQUEST[to_hours]");
            $this->session->set_userdata('from_engine', "$_REQUEST[from_engine]");
            $this->session->set_userdata('to_engine', "$_REQUEST[to_engine]");
            $this->session->set_userdata('from_year', "$_REQUEST[from_year]");
            $this->session->set_userdata('to_year', "$_REQUEST[to_year]");
            $this->session->set_userdata('advanced_search', TRUE);
        }

        $this->session->set_userdata("ad_type", "$ad_type");
        $this->session->set_userdata("type_id", "$type_id");
        $this->session->set_userdata("order_type", "$order_type");
        $this->session->set_userdata("order_by", "$order_name");
        //Above 4 values comes from URL/Left menu
        $ad_type_ad = $this->session->userdata('ad_type_ad');
        $seller_type_ad = $this->session->userdata('seller_type_ad');
        $country_id_ad = $this->session->userdata('country_id_ad');
        $area_id_ad = $this->session->userdata('area_id_ad');
        $type_id_ad = $this->session->userdata('type_id_ad');
        $company_id_ad = $this->session->userdata('company_id_ad');
        $model_id_ad = $this->session->userdata('model_id_ad');
        $post_code = $this->session->userdata('post_code');
        $from_price = $this->session->userdata('from_price');
        $to_price = $this->session->userdata('to_price');
        $from_mileage = $this->session->userdata('from_mileage');
        $to_mileage = $this->session->userdata('to_mileage');
        $from_hours = $this->session->userdata('from_hours');
        $to_hours = $this->session->userdata('to_hours');
        $from_engine = $this->session->userdata('from_engine');
        $to_engine = $this->session->userdata('to_engine');
        $from_year = $this->session->userdata('from_year');
        $to_year = $this->session->userdata('to_year');
        //Above 16 values comes from Advanced Search 

        $type_id_top = $this->session->userdata('type_id_top');
        $search_text = $this->session->userdata('search_text');
        //Above 2 values comes from Top Search          

        $con.=' 1';

        if (is_numeric($ad_type)) {
            $con.=' and bike.ad_type=' . $ad_type;
        }
        if (is_numeric($type_id)) {
            $con.=' and type.type_parent_id=' . $type_id;
        }
        if ($ad_type_ad != '') {
            $con.=' and bike.ad_type= ' . '"' . $ad_type_ad . '"';
        }
        if ($seller_type_ad != '') {
            $con.=' and bike.seller_type= ' . '"' . $seller_type_ad . '"';
        }
        if ($country_id_ad != '') {
            $con.=' and bike.country_id= ' . '"' . $country_id_ad . '"';
        }
        if ($area_id_ad != '') {
            $con.=' and bike.area_id= ' . '"' . $area_id_ad . '"';
        }
        if ($type_id_ad != '') {
            $con.=' and bike.type_id= ' . '"' . $type_id_ad . '"';
        }
        if ($company_id_ad != '') {
            $con.=' and bike.company_id= ' . '"' . $company_id_ad . '"';
        }
        if ($model_id_ad != '') {
            $con.=' and bike.model_id= ' . '"' . $model_id_ad . '"';
        }
        if ($post_code != '') {
            //$con.=" and bike.post_code='$_REQUEST[post_code]'";
            $con.=' and bike.post_code= ' . '"' . $post_code . '"';
        }

        if ($from_price != '' && $to_price != '') {
            $con.= " and (bike.price between '$from_price' and '$to_price') ";
        }
        if ($from_mileage != '' && $to_mileage != '') {
            $con.= " and (bike.mileage between '$from_mileage' and '$to_mileage') ";
        }
        if ($from_hours != '' && $to_hours != '') {
            $con.= " and (bike.hours between '$from_hours' and '$to_hours') ";
        }
        if ($from_engine != '' && $to_engine != '') {
            $con.= " and (bike.engine between '$from_engine' and '$to_engine') ";
        }
        if ($from_year != '' && $from_year != '') {
            $con.= " and (bike.year between '$from_year' and '$from_year') ";
        }
        if ($type_id_top != '') {
            $con.=' and bike.type_id= ' . '"' . $type_id_top . '"';
        }
        if ($search_text != '') {
            $con.=' and (bike.ad_title like ' . '"%' . $search_text . '%" or bike.full_description like ' . '"%' . $search_text . '%"  ) ';
        }


        // if user put from data but not to data / to data but not from data then following condition concate
        if ($from_price != '' && $to_price == '') {
            $con.=' and bike.price= ' . '"' . $from_price . '"';
        }
        if ($from_price == '' && $to_price != '') {
            $con.=' and bike.price= ' . '"' . $to_price . '"';
        }

        if ($from_mileage != '' && $to_mileage == '') {
            $con.=' and bike.mileage= ' . '"' . $from_mileage . '"';
        }
        if ($from_mileage == '' && $to_mileage != '') {
            $con.=' and bike.mileage= ' . '"' . $to_mileage . '"';
        }

        if ($from_hours != '' && $to_hours == '') {
            $con.=' and bike.mileage= ' . '"' . $from_hours . '"';
        }
        if ($from_hours == '' && $to_hours != '') {
            $con.=' and bike.mileage= ' . '"' . $to_hours . '"';
        }
        if ($from_engine != '' && $to_engine == '') {
            $con.=' and bike.hours= ' . '"' . $from_engine . '"';
        }
        if ($from_engine == '' && $to_engine != '') {
            $con.=' and bike.engine= ' . '"' . $to_hours . '"';
        }
        if ($from_year != '' && $to_year == '') {
            $con.=' and bike.year= ' . '"' . $from_year . '"';
        }
        if ($from_year == '' && $to_year != '') {
            $con.=' and bike.year= ' . '"' . $to_year . '"';
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
        $config['base_url'] = site_url('adz/index/' . $ad_type . '/' . $type_id . '/' . $order_type . '/' . $order_name . '/');
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
        $this->session->set_userdata("ajax_start", "$data[start]");
        $this->session->set_userdata("back_page", "index");
        $data['end'] = $start + count($data['rows']);
        $data['total'] = $config['total_rows'];
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = $this->dir;
        $data['page_title'] = 'All Bike';
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
            $this->session->unset_userdata('company_id');
        }
        if ($_POST['search']) {
            $start = 0;
            $this->session->unset_userdata('country_id');
            $this->session->unset_userdata('area_id');
            $this->session->unset_userdata('t_id');
            $this->session->unset_userdata('model_id');
            $this->session->unset_userdata('company_id');
            $this->session->set_userdata('country_id', "$_REQUEST[country_id]");
            $this->session->set_userdata('area_id', "$_REQUEST[area_id]");
            $this->session->set_userdata('t_id', "$_REQUEST[type_id]");
            $this->session->set_userdata('model_id', "$_REQUEST[model_id]");
            $this->session->set_userdata('company_id', "$_REQUEST[company_id]");
        }
        $this->session->set_userdata('order_by', "$order");
        $this->session->set_userdata("ad_type", "$ad_type");
        $this->session->set_userdata("type_id", "$type_id");
        $country_id = $this->session->userdata('country_id');
        $area_id = $this->session->userdata('area_id');
        $t_id = $this->session->userdata('t_id');
        $make_id = $this->session->userdata('company_id');
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
            $con.=' and bike.company_id=' . $make_id;
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
        $data['action'] = 'adz/index/';
        $this->load->view('login_with_top', $data);
    }

    function details($bike_id = '') {
        $this->session->set_userdata('user_url', 'adz/details/' . $bike_id);
        if ($bike_id == '') {
            redirect('adz');
        }
        if ($_POST['submit']) {
            $this->mod_adz->save_comment($bike_id);
            redirect('adz/details/' . $bike_id);
        }
        $data['details_row'] = $this->mod_home->get_bike_details($bike_id);
        $data['bike_comment'] = sql::rows("bike_comment", "bike_id=$bike_id");
        $view_info = sql::row('bike', "bike_id=$bike_id", 'views');
        $new_views = $view_info['views'] + 1;
        $this->db->query("update bike set views=$new_views where bike_id=$bike_id");
        $data['dir'] = $this->dir;
        $data['page'] = 'details';
        $data['action'] = "adz/details/" . $bike_id;
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
        $this->load->library('pagination');
        $start = $this->uri->segment(3);
        $con = 1;
        if (!is_numeric($start)) {
            $start = 0;
        }
        $config['uri_segment'] = 3;
        $config['base_url'] = site_url('adz/my_ads');
        $user_id = $this->session->userdata('user_id');
        $config['total_rows'] = count($this->mod_home->get_save_bike($user_id));
        $config['num_links'] = 10;
        $config['per_page'] = 8;
        $config['next_link'] = "&raquo;";
        $config['prev_link'] = "&laquo;";
        $config['page_query_string'] = false;
        $this->pagination->initialize($config);
        $data['pagination_links'] = $this->pagination->create_links();
        if ($user_id != '') {
            $data['rows'] = $this->mod_home->get_my_bike($user_id);
            $data['save_rows'] = $this->mod_home->get_save_bike($user_id, $limit = true, $start, $config['per_page']);
        }
        if (count($data['save_rows']) > 0) {
            $data['start'] = $start + 1;
        } else {
            $data['start'] = 0;
        }
        $data['end'] = $start + count($data['save_rows']);
        $data['total'] = $config['total_rows'];
        $this->session->set_userdata("back_page", "my_ads");
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = $this->dir;
        $data['page'] = 'my_ads';
        $data['page_title'] = 'My Ad';
        $this->load->view('main', $data);
    }

    function add_adz() {
        if (!common::is_logged_in()) {
            redirect('login/adz_login_page');
        }
        if ($_POST['save']) {
            if ($this->form_validation->run('valid_adz')) {
                $bike_id = $this->session->userdata('bike_insert_id');
                if ($bike_id == '') {
                    $data = array(
                        'ad_type' => $_POST['ad_type'],
                        'seller_type' => $_POST['seller_type'],
                        'ad_title' => $_POST['ad_title'],
                    );
                    $this->db->insert("bike", $data);
                    $bike_id = $this->db->insert_id();
                    $this->session->set_userdata("bike_insert_id", "$bike_id");
                } else {
                    $data = array(
                        'ad_type' => $_POST['ad_type'],
                        'seller_type' => $_POST['seller_type'],
                        'ad_title' => $_POST['ad_title']
                    );
                    $this->db->update("bike", $data, array("bike_id" => $bike_id));
                }
                $this->session->set_userdata($_POST);
                // $this->session->userdata('adv_cost', "$_POST[adv_cost]");
                redirect('adz/step2');
            }
        }

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
        //$this->session->unset_userdata('adv_cost');
        if ($_POST['save']) {
            if ($this->form_validation->run('valid_adz_step2')) {
                //echo 1 .$_POST[parent_id];
                $this->session->set_userdata('parent_type_id', "$_POST[parent_id]");
                $this->session->set_userdata($_POST);
                redirect('adz/step3');
            }
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
        //echo $parent_id_des;
        //echo $is_des['description_type'];
        if ($is_des['description_type'] == 0) {

            if ($_POST['save']) {
                //echo 'here1';
                if ($this->form_validation->run('valid_adz_step3')) {
                    $this->session->set_userdata($_POST);
                    redirect('adz/general_info');
                }
            }
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
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = $this->dir;
        $data['action'] = 'adz/general_info';
        $data['page'] = 'general_info';
        $data['page_title'] = "Add New Bike";
        $this->load->view('login_with_top', $data);
    }

    function step4_thumb() {
        if (isset($_POST['submit'])) {
            $j = 0; //Variable for indexing uploaded image 
            $session_id = $this->session->userdata('session_id');
            $this->db->query("delete from bike_image where session_id='$session_id' and bike_id=0");

            for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
                $single_iamge = $_FILES['file']['name'][$i];
                //echo $single_iamge; 
                if ($single_iamge != "") {
                    //echo 'pre_image ok ';exit;

                    $image_name = $this->mod_adz->add_file($single_iamge, $i);
                    //echo $image_name.' ok';  exit;
                    if ($image_name != '') {
                        //echo 'return image name ok';  exit;
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

    function step4() {
        if (!common::is_logged_in()) {
            redirect('login/adz_login_page');
        }
        ini_set('memory_limit', '-1');
        if (isset($_POST['submit'])) {
            $j = 0; //Variable for indexing uploaded image 
            $session_id = $this->session->userdata('session_id');
            $bike_id = $this->session->userdata('bike_insert_id');
            $this->db->query("delete from bike_image where session_id='$session_id' and bike_id='$bike_id'");
            $target_path = "uploads/bike_image/"; //Declaring Path for uploaded images
            for ($i = 0; $i < count($_FILES['file']['name']); $i++) {//loop to get individual element from the array
                $validextensions = array("jpeg", "jpg", "png");  //Extensions which are allowed
                //$ext = explode('.', basename($_FILES['file']['name'][$i])); //explode file name from dot(.) 

                $random_digit = rand(0000, 9999);
                $file = $random_digit . '_' . str_replace(' ', '_', $_FILES['file']['name'][$i]);
                $target_path = $target_path . basename($file);

                //$file_extension = end($ext); //store extensions in the variable
                // $target_path = $target_path . md5(1) . "." . $ext[count($ext) - 1]; // md5(uniqid()) set the target path with a new name of image
                $j = $j + 1; //increment the number of uploaded images according to the files in array       

                if (($_FILES["file"]["size"][$i] < 5000000000)) {
                    $name = $_FILES['file']['name'][$i];

                    if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {//if file moved to uploads folder
                        //echo $j . ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
                        $this->createThumbnail($file);
                        $this->createLarge($file);
                        $session_id = $this->session->userdata('session_id');
                        $bike_id = $this->session->userdata('bike_insert_id');
                        $this->db->query("insert into bike_image set bike_image='$file',session_id='$session_id',bike_id='$bike_id'");
                    } else {//if file was not moved.
                        echo $j . ').<span id="error">please try again!.</span><br/><br/>';
                    }
                } else {//if file size and file type was incorrect.
                    echo $j . ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
                }

                $target_path = "uploads/bike_image/";
            }
            //$bike_id = $this->mod_adz->save_bike_video();     
            $this->session->set_userdata($_POST);
            redirect('adz/step6');
        }



        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = $this->dir;
        $data['action'] = 'adz/step4';
        $data['page'] = 'ad_step4';
        $data['page_title'] = "Add New Bike";
        $this->load->view('main_html5', $data);
    }

    function step5() {   // This function is not used now but can be required in future
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
        }
        redirect('adz/success');
        $bike_id = $this->session->userdata('bike_insert_id');
        $data['session_array'] = $this->session->all_userdata();
        $data['page_title'] = 'Confirm Ad';
        $data['dir'] = 'adz';
        $data['page'] = 'confirm';
        $this->load->view("main", $data);
    }

    function createThumbnail($filename) {
        ini_set('memory_limit', '-1');
        $final_width_of_image = 450;
        $path_to_image_directory = 'uploads/bike_image/';
        $path_to_thumbs_directory = 'uploads/bike_image/thumbs/';

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
        $path_to_image_directory = 'uploads/bike_image/';
        $path_to_thumbs_directory = 'uploads/bike_image/large/';

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
        // $data['adz_images'] = sql::rows("adz_images", "adz_id=$adz_id");
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

    function delete_adz($bike_id = '') {
        if (!common::is_logged_in()) {
            redirect('login');
        }
        if ($bike_id == '') {
            redirect('adz/my_ads');
        }

        $all_image = sql::rows('bike_image', "bike_id=$bike_id");
        foreach ($all_image as $file) {
            @unlink(UPLOAD_PATH . "bike_image/" . $file['bike_image']);
            @unlink(UPLOAD_PATH . "bike_image/thumbs/" . $file['bike_image']);
            @unlink(UPLOAD_PATH . "bike_image/large/" . $file['bike_image']);
        }
        sql::delete('bike', 'bike_id=' . $bike_id);
        sql::delete('bike_image', 'bike_id=' . $bike_id);
        sql::delete('save_ad', 'bike_id=' . $bike_id);
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
        echo $this->mod_adz->get_model_options($_POST['make_id'], $_POST['type_id']);
    }

    function get_image() {
        $file = $_POST['image'];
        if ($_FILES[$file]['name'] != '') {
            $image = $this->mod_adz->add_image($file);
            echo $image;
        }
    }

    function edit_my_adz($bike_id = '') {
        if ($bike_id == '') {
            redirect('adz/my_ads');
        }
        if ($_POST['update']) {
            if ($this->form_validation->run('valid_adz_update')) {
                $this->mod_adz->update_my_bike_ad($bike_id);
                $this->session->set_flashdata('msg', 'Successfully Updated!!!');
                redirect('adz/my_ads');
            }
        }
        $data['bike_id'] = $bike_id;
        $data['b'] = sql::row("bike", "bike_id=$bike_id");
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = $this->dir;
        $data['page'] = 'edit_form';
        $data['page_title'] = 'Edit My Ads';

        $this->load->view('main_contact', $data);
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

    function blog_description($id='') {
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

    function delete_comment($bike_id='', $comment_id='') {
        if (!common::is_logged_in())
            common::redirect();
        sql::delete("bike_comment", "id=$comment_id");
        redirect('adz/details/' . $bike_id);
    }

}

?>