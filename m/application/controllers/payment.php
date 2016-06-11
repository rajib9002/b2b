<?php

class payment extends Controller {

    function payment() {
        parent::Controller();
        //common::is_logged();
        $this->load->model('mod_payment');
    }

    function checkout() {
        $data['form_submitting'] = false;

        if ($_POST['save']) {
            $data = common::get_settings_data();
            $business_email = $data['business_email'];
            $load_amount = $_POST['amount'];
            $user_id = $this->session->userdata('seller_email');
            $session_id = $this->session->userdata('ession_id');
            $insdata = array(
                'user_id' => $user_id,
                'session_id' => $session_id,
                'transaction_amount' => $load_amount,
                'paypal_status' => 0
            );
            $this->db->insert("transaction", $insdata);
            $transaction_id = $this->db->insert_id();
            $this->session->set_userdata('transaction_id', $transaction_id);
            $amount = $load_amount;

$currency = $_POST['currency'];

            $this->load->library('paypal');
            $notify_url = site_url('payment/process');
            $return_url = site_url('payment/success');
            $failure_url = site_url('payment/failure');
            $obj = new Paypal();
            $obj->add_field("amount", $amount);
            $obj->add_field("return", $return_url);
            $obj->add_field("cancel_return", site_url());
            $obj->add_field("notify_url", $notify_url);
            $obj->add_field("business", $business_email);
            $obj->add_field("cmd", "_xclick");
            $obj->add_field("rm", "2");
            $obj->add_field("currency_code", "$currency");
            $data['paypal_form'] = $obj->paypal_form();
            $data['form_submitting'] = true;
            $data['page_banner'] = 'images/all.png';
            $data['dir'] = 'payment';
            $data['page'] = 'checkout_type';
            $data['page_title'] = 'Payment';
            $this->load->view('main', $data);
        }



        if ($_POST['card_payment']) {
            $this->load->library('paypal_pro');
            $user_id = $this->session->userdata('seller_email');
            $load_amount = $_POST['amount'];
            $session_id = $this->session->userdata('session_id');
            $insdata = array(
                'user_id' => $user_id,
                'session_id' => $session_id,
                'transaction_amount' => $load_amount,
                'paypal_status' => 0
            );
            $this->db->insert("transaction", $insdata);
            $transaction_id = $this->db->insert_id();

$currency = $_POST['currency'];

            $this->session->set_userdata('transaction_id', $transaction_id);
            $firstName = urlencode($_POST['firstName']);
            $lastName = urlencode($_POST['lastName']);
            $creditCardType = urlencode($_POST['creditCardType']);
            $creditCardNumber = urlencode($_POST['creditCardNumber']);
            $expDateMonth = urlencode($_POST['expDateMonth']);
            $padDateMonth = str_pad($expDateMonth, 2, '0', STR_PAD_LEFT);
            $expDateYear = urlencode($_POST['expDateYear']);
            $cvv2Number = urlencode($_POST['cvv2Number']);
            $address1 = urlencode($_POST['address1']);
            $address2 = urlencode($_POST['address2']);
            $city = urlencode($_POST['city']);
            $state = urlencode($_POST['state']);
            $zip = urlencode($_POST['zip']);
            $amount = urlencode($_POST['amount']);
            $currencyCode = "$currency";
            $paymentAction = urlencode("Sale");
            $nvpRecurring = '';
            $methodToCall = 'DoDirectPayment';
            $nvpstr = '&PAYMENTACTION=' . $paymentAction . '&AMT=' . $amount . '&CREDITCARDTYPE=' . $creditCardType . '&ACCT=' . $creditCardNumber . '&EXPDATE=' . $padDateMonth . $expDateYear . '&CVV2=' . $cvv2Number . '&FIRSTNAME=' . $firstName . '&LASTNAME=' . $lastName . '&STREET=' . $address1 . '&CITY=' . $city . '&STATE=' . $state . '&ZIP=' . $zip . '&COUNTRYCODE=US&CURRENCYCODE=' . $currencyCode . $nvpRecurring;
            $paypalPro = new paypal_pro();
           // echo $paypalPro;

            $data = common::get_settings_data();
            $business_email = $data['api_user'];
            $password = $data['api_password'];
            $signature = $data['api_signature'];

            $paypalPro->initialise_paypal($business_email, $password, $signature, '', '', FALSE, FALSE);

           // $paypalPro->initialise_paypal('anwarw_1335364898_biz_api1.yahoo.com', '1335364930', 'AXzcS1nDp-6S7CNgFzkeBGv.IEtwAbxPnK3aA0Dv2WLzGz3SOwXZW6JY', '', '', FALSE, FALSE);
            $resArray = $paypalPro->hash_call($methodToCall, $nvpstr);
            $ack = strtoupper($resArray["ACK"]);

            // print_r($resArray);

            if ($ack != "SUCCESS") {
                $failure = $resArray["ACK"];
                $id = $resArray['CORRELATIONID'];
                $card_failure = $this->mod_payment->card_payment_failure($failure, $id);
                $this->session->set_flashdata('msg', $card_failure);
                redirect('payment/card_payment_failure');
            } else {
                $success_id = $resArray["TRANSACTIONID"];
                $card_success = $this->mod_payment->card_payment_success($success_id);
                $this->session->set_flashdata('msg', $card_success);
                redirect('payment/card_payment_success');
            }
        }


        if ($_POST['authorize_payment']) {

            $this->load->library('Config');
            $transaction = new AuthorizeNetAIM;
            $transaction->setSandbox(AUTHORIZENET_SANDBOX);
            $amount = $_POST['amount'];
            $card_no = $_POST['x_card_num'];
            $date = $_POST['x_exp_date'];
            $transaction->setFields(
                    array(
                        'amount' => $amount,
                        'card_num' => $_POST['x_card_num'],
                        'exp_date' => $_POST['x_exp_date'],
                        'first_name' => $_POST['x_first_name'],
                        'last_name' => $_POST['x_last_name'],
                        'address' => $_POST['x_address'],
                        'city' => $_POST['x_city'],
                        'state' => $_POST['x_state'],
                        'country' => $_POST['x_country'],
                        'zip' => $_POST['x_zip'],
                        'email' => $_POST['x_email'],
                        'card_code' => $_POST['x_card_code'],
                    )
            );
            $response = $transaction->authorizeAndCapture($amount, $card_no, $date);
            if ($response->approved) {
                // Transaction approved! Do your logic here.
                redirect('payment/success_autho');
            } else {
                redirect('payment/failure_autho');
            }
        }

        $data = common::get_settings_data();
//        $user_id = $this->session->userdata('user_id');
//        $data['user_info'] = sql::row('users', 'user_id=' . $user_id);

 $data['session_array'] = $this->session->all_userdata();
        $data['page_banner'] = 'images/all.png';
        $data['dir'] = 'payment';
        $data['page'] = 'checkout_type';
        $data['page_title'] = 'Payment';
        $this->load->view('main', $data);
    }

    function success_autho() {

        $data['dir'] = 'payment';
        $data['page'] = 'success_autho';
        $data['page_banner'] = 'images/all.png';
        $data['dir'] = 'payment';
        $data['page_title'] = 'Success Authorize Payment';
        $this->load->view('main', $data);
    }

    function failure_autho() {

        $data['dir'] = 'payment';
        $data['page'] = 'failure_autho';
        $data['page_banner'] = 'images/all.png';
       
        $data['dir'] = 'payment';
        $data['page_title'] = 'Fail Authorize Payment';
        $this->load->view('main', $data);
    }

    function process() {
        $this->load->library('paypal');
        $obj = new Paypal();
        $data = common::get_settings_data();
        $user_id = $this->session->userdata('user_id');
        $admin_email = $data['admin_email'];
        $business_email = $data['business_email'];
        $notify_email = sql::row("email_settings", "status=1");
        $user_email = sql::row("user", "user_id=$user_id");
        if ($obj->validate_ipn()) {
            $from = $admin_email;
            $from_name = 'Zafran Perfumes';
            $to = $user_email['user_email'];
            $subject = "Payment Successful";
            $msg = "Dear Sir,
            Keep in touch.
            <BR><BR>Regards,<BR>
            Online Support Team
            $from_name";
            common::sending_mail($from, $from_name, $to, $subject, $msg);
            if ($obj->ipn_data['currency'] != "USD") {
                exit;
            }

            if ($obj->ipn_data['receiver_email'] != $business_email) {
                echo 'fraud attempt';
                exit;
            }

            if ($obj->ipn_data['payer_status'] != "verified") {
                exit;
            }
        }
    }

    function success() {
        $user_id = $this->session->userdata('user_id');
        $this->mod_payment->success_transaction();
        $data['page_banner'] = 'images/all.png';
        $data['dir'] = 'payment';
        $data = sql::row('user', 'user_id=' . $user_id);
         $data['page_title'] = 'Payment Success';
        $data['dir'] = 'payment';
        $data['page'] = 'payment_success';
        $this->load->view('main', $data);
    }

    function failure() {
        $this->mod_payment->fail_transaction();
       $data['page_banner'] = 'images/all.png';
        $data['dir'] = 'payment';
         $data['page_title'] = 'Payment Fail';
        $data['dir'] = 'product';
        $data['page'] = 'payment_failure';
        $this->load->view('main', $data);
    }

    function card_payment_failure() {
        $this->mod_payment->fail_transaction();
        $transaction_id = $this->session->userdata('transaction_id');
        $data = sql::row('transaction', 'transaction_id=' . $transaction_id);
        $data['msg'] = $this->session->flashdata('msg');
         $data['page_banner'] = 'images/all.png';
          $data['page_title'] = 'Card Payment Fail';
        $data['dir'] = 'payment';
        $data['page'] = 'card_payment_failure';
        $this->load->view('main', $data);
    }

    function card_payment_success() {
        $user_id = $this->session->userdata('user_id');
         $this->mod_payment->success_transaction();
        $transaction_id = $this->session->userdata('transaction_id');
        $data = sql::row('transaction', 'transaction_id=' . $transaction_id);
       $data['page_banner'] = 'images/all.png';
        $data['dir'] = 'payment';
         $data['page_title'] = 'Card Payment Success';
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = 'payment';
        $data['page'] = 'card_payment_success';
        $this->load->view('main', $data);
    }

}

?>