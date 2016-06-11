<?php

class mod_account extends Model {

    function mod_account() {
        parent::Model();
    }

    function save_info($user_id='') {
        $data = array(
            'user_first_name' => $_POST['user_first_name'],            
            'user_last_name' => $_POST['user_last_name'],
            'user_email' => $_POST['user_email'],
            'user_phone' => $_POST['user_phone'],
            'area_id' => $_POST['area_id'],
            'user_address' => $_POST['user_address'],
        );
        $this->db->update("users", $data, array("user_id" => $user_id));
        return true;
    }
     function confirm_password() {
        $password=$_POST['old_password'];
        $user_id=$this->session->userdata('user_id');
        $sql = "SELECT * FROM users WHERE user_id = ? AND user_password = ?";
        $query=$this->db->query($sql, array($user_id, $password));
        if($query->num_rows()>0) {
            return true;
        }else {
            return false;
        }
    }
	
	
    function add_image($file='', $pre_image=''){

        $param['dir'] = UPLOAD_PATH."profile_pic/";
        $param['type'] = IMG_EXT;

        if (class_exists('zupload')) {
            $this->zupload->setUploadDir(UPLOAD_PATH . 'profile_pic/');
        } else {
            $this->load->library('zupload', $param);
        }

        if ($pre_image != "") {
            $this->zupload->delFile($pre_image);
            $this->zupload->delFile("full_" . $pre_image);

        }

        $this->zupload->setFileInputName('file');
        $this->zupload->upload(true);
        $img = $this->zupload->getOutputFileName();
        if (!class_exists('zthumb')) {
            $this->load->library('zthumb');
        }
        $this->zthumb->createThumb($img, "full_" . $img, $param['dir'], $param['dir'], 202, 202, false);
        $this->zthumb->createThumb($img, "mid_" . $img, $param['dir'], $param['dir'], 80, 80, false);
        $this->zthumb->createThumb($img, "small_" . $img, $param['dir'], $param['dir'], 50, 50, false);
        return $img;
    }
    
    function add_photo($id=''){

        $file = 'user_image';
        $image="";
        if ($_FILES[$file]['name'] != '') {
            $image = $this->add_image($file);
        }

       $sql = "update users set
        user_image='$image' where user_id='$id'";
         $this->db->query($sql);
    }

}
?>
