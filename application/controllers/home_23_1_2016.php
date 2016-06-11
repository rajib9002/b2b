<?php

class home extends Controller {
private $dir = 'home';
    public function __construct() {
        parent::Controller();
        $this->load->model('mod_home');
    }
    function index() {
        $con=' 1';
        $this->load->library('pagination');
        $start = $this->uri->segment(3);
        if ($start == '' || !is_numeric($start) || $start<0) {
            $start = 0;
        }
        $config['uri_segment'] = 3;
        $config['base_url'] = site_url('home/index/');
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
        $data['page_title'] = 'All Advertise';
        $data['page'] = 'index';
        $this->load->view('main', $data);
    }


    function signup() {
        $this->session->unset_userdata('adv_cost');
        redirect('signup/index');
    }



    function compress_image($source_url, $destination_url, $quality) {
        $info = getimagesize($source_url);
        if ($info['mime'] == 'image/jpeg') {
            $image = imagecreatefromjpeg($source_url);
        } else if ($info['mime'] == 'image/gif') {
            $image = imagecreatefromgif($source_url);
        } else if ($info['mime'] == 'image/png') {
            $image = imagecreatefrompng($source_url);
        }
        imagejpeg($image, $destination_url, $quality);
        return $destination_url;
    }

    function getExtension($str) {
        $ext = pathinfo($str, PATHINFO_EXTENSION);
        return $ext;
    }


    function add_image_all() {
        $session_id = $this->session->userdata('session_id');
        $this->db->query("delete from bike_image where session_id='$session_id' and bike_id=0");
        foreach ($_FILES["images"]["name"] as $key => $error) {
            if ($error == UPLOAD_ERR_OK) {
                $name = $_FILES["images"]["name"][$key];
                move_uploaded_file($_FILES["images"]["tmp_name"][$key], "uploads/bike_image/" . $_FILES['images']['name'][$key]);

                $session_id = $this->session->userdata('session_id');
                $this->db->query("insert into bike_image set bike_image='$name',session_id='$session_id',bike_id=0");
            }
        }
    }

    function upload_multiple_image() {

        if (isset($_POST['submit'])) {
            $j = 0; //Variable for indexing uploaded image
            $session_id = $this->session->userdata('session_id');
            $this->db->query("delete from bike_image where session_id='$session_id' and bike_id=0");
            $target_path = "uploads/bike_image/"; //Declaring Path for uploaded images
            for ($i = 0; $i < count($_FILES['file']['name']); $i++) {//loop to get individual element from the array
                $validextensions = array("jpeg", "jpg", "png");  //Extensions which are allowed
                $ext = explode('.', basename($_FILES['file']['name'][$i])); //explode file name from dot(.)
                $file_extension = end($ext); //store extensions in the variable
                // $target_path = $target_path . md5(1) . "." . $ext[count($ext) - 1]; // md5(uniqid()) set the target path with a new name of image
                $j = $j + 1; //increment the number of uploaded images according to the files in array

                if (($_FILES["file"]["size"][$i] < 5000000) //Approx. 100kb=100000 files can be uploaded.
                        && in_array($file_extension, $validextensions)) {
                    $name = $_FILES['file']['name'][$i];
                    if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path . $name)) {//if file moved to uploads folder
                        //echo $j . ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
                        $session_id = $this->session->userdata('session_id');
                        $this->db->query("insert into bike_image set bike_image='$name',session_id='$session_id',bike_id=0");
                    } else {//if file was not moved.
                        echo $j . ').<span id="error">please try again!.</span><br/><br/>';
                    }
                } else {//if file size and file type was incorrect.
                    echo $j . ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
                }
            }
        }



        if ($_POST['save']) {
            $bike_id = $this->mod_adz->save_bike_video();
            $this->session->set_userdata('bike_id', "$bike_id");
            $session_id = $this->session->userdata('session_id');

            $this->db->query("update bike_image set bike_id='$bike_id' where bike_id=0 and session_id='$session_id'");
            $this->session->set_userdata($_POST);
            redirect('adz/confirm');
        }
        $data['dir'] = 'adz';
        $data['page_banner'] = 'add_place';
        $data['action'] = 'adz/step4';
        $data['page'] = 'ad_step4';
        $data['page_title'] = "Add New Bike";
        $this->load->view('login_with_top', $data);

    }

    function add_file($title='') {
        $file_name = "";
        if ($title)
            $param['dir'] = UPLOAD_PATH . "bike_image/" . $title . "/";
        else
            $param['dir'] = UPLOAD_PATH . "bike_image/";
        $param['type'] = FILE_TYPE;
        $this->load->library('zupload', $param);
        $this->zupload->setUploadDir($param['dir']);
        $this->zupload->setFileInputName($title);
        $this->zupload->upload(true);
        $file_name = $this->zupload->getOutputFileName();
        if (!class_exists('zthumb')) {
            $this->load->library('zthumb');
        }
        $this->zthumb->createThumb($file_name, "190_108" . $file_name, $param['dir'], $param['dir'] . "thumb/", 190, 108, true);
        $this->zthumb->createThumb($file_name, "1366_768_" . $file_name, $param['dir'], $param['dir'] . "big/", 1366, 768, true);
        //$this->zupload->delFile($file_name);
        return $file_name;
    }

    function sms() {
        if (isset($_POST['send_sms'])) {
            $url = 'http://bulksms.vsms.net/eapi/submission/send_sms/2/2.0';
            $msisdn = "$_POST[mobile]";
            $sms = "$_POST[sms]";
            $data = 'username=bike2biker&password=info@bike2biker&message=' . urlencode($sms) . '&msisdn=' . urlencode($msisdn);
            $response = $this->mod_home->do_post_request($url, $data);
            $data['response'] = $response;
            $data['dir'] = 'home';
            $data['page'] = 'sms';
            $data['page_title'] = 'Send SMS';
            $this->load->view("main", $data);
        } else {
            $data['dir'] = 'home';
            $data['page'] = 'sms';
            $data['page_title'] = 'Send SMS';
            $this->load->view("main", $data);
        }
    }

    function sorry() {
        $data['dir'] = 'home';
        $data['page'] = 'sorry';
        $data['page_title'] = 'Your Transaction Failure';
        $this->load->view("main", $data);
    }

    function success() {
        $data['dir'] = 'home';
        $data['page'] = 'success';
        $data['page_title'] = 'Your Transaction Success';
        $this->load->view("main", $data);
    }

    function reply($id='') {
        $from = $_POST['contact_email'];
        $from_name = $_POST['contact_name'];
        $to = $_POST['to_email'];
        $subject =$_POST['contact_subject'];
        $msg = $_REQUEST['contact_message'];
        common::sending_mail($from, $from_name, $to, $subject, $msg);
        redirect('adz/details/'.$id);
    }

}

?>