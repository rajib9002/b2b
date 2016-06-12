<?php

class api extends Controller {

    public function __construct() {
        parent::Controller();
    }

    function request_for_login() {
        //$access=common::encrypt('1','1');
        //echo $access;exit;
        //$fõ´ÉyMdý@Ì˜Ì°C('5_O,oÚOo5
        //echo $_POST['access_token'];exit;

        //$value=trim(}cs;bÇñøøfÄçxŸág%zUŽ‘Âsî|Ø²");
        //echo $value;exit;
        //$key="";
        //$access=common::decrypt($value,$key);
        //echo $access;exit;
        $access='b2b';
        if($access=='b2b') {
            $status = 1;
            $sql = "SELECT * FROM users WHERE (user_name = ?  or user_email= ? ) AND user_password = ? and user_status= ? and user_type=2";
            $query = $this->db->query($sql, array($_POST['user_name'], $_POST['user_name'], $_POST['user_password'], $status));
            if ($query->num_rows() > 0) {
                $data = $query->row_array();
                $array = array(
                        'success' => true,
                        'user_id' => $data['user_id'],
                        'user_name' => $data['user_name'],
                        'user_first_name' => $data['user_first_name'],
                        'user_last_name' => $data['user_last_name'],
                        'user_email' => $data['user_email'],
                        'user_phone' => $data['user_phone'],
                        'user_type' => $data['user_type'],
                        'msg' => 'Login Successsfull'
                );
                echo json_encode($array);
            } else {
                $array = array(
                        'success' => false,
                        'msg' => 'Login Failed'
                );
                echo json_encode($array);
            }
        }else {
            $array = array(
                    'success' => false,
                    'msg' => 'access not correct'
            );
            echo json_encode($array);
        }
    }

}
?>