<?php

class mod_payment extends Model {

    function mod_payment() {
        parent::Model();
    }
    function fail_transaction() {
        $user_id = $this->session->userdata('user_id');
        $transaction_id = $this->session->userdata('transaction_id');
        $sql = "update transaction set paypal_status=0 where user_id='$user_id' and transaction_id='$transaction_id'";
        $this->db->query($sql);
    }
    function success_transaction() {
        $user_id = $this->session->userdata('user_id');
        $session_id = $this->session->userdata('session_id');
        $sql = "update transaction set paypal_status=1 where user_id='$user_id' and transaction_id='$transaction_id'";
        $this->db->query($sql);
        $bike_id = $this->session->userdata("bike_insert_id");
        $sql1 = "update bike set orderPaymentStatus=1 where bike_id=$bike_id and user_id=$user_id";
        $this->db->query($sql1);
        
    }

    function card_payment_failure($failure='',$id='') {
        $user_id=$this->session->userdata('user_id');
        $transaction_id = $this->session->userdata('transaction_id');
         $msg='Paypal payment fail';
         $data = array(
            'paypal_status'=>0,
            'paypal_transaction_id'=>$id
        );
        $this->db->update("transaction", $data, $data=array('user_id'=>$user_id,'transaction_id'=>$transaction_id));
        return $msg;
    }
    
    function card_payment_success($success_id='') {
        $user_id=$this->session->userdata('user_id');
     
        $session_id = $this->session->userdata('session_id');
         $msg='Paypal payment Successful';
         $data = array(
            'paypal_status'=>1,
            'paypal_transaction_id'=>$success_id
        );
        $this->db->update("transaction", $data, $data=array('user_id'=>$user_id,'transaction_id'=>$transaction_id));



        $bike_id = $this->session->userdata("bike_insert_id");
        $sql1 = "update bike set orderPaymentStatus=1 where bike_id=$bike_id and user_id=$user_id";
        $this->db->query($sql1);
        return $msg;
    }

    

}
?>