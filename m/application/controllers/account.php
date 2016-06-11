<?php

class account extends Controller{
    function account(){
        parent::Controller();
        $this->load->model('mod_account');
    }


    function index(){
        if (!common :: is_logged_in()) {
             $this->session->set_userdata('user_url','account');
             redirect('login');
        }
        $user_id=$this->session->userdata('user_id');
        if ($_POST['update']) {
            if ($this->form_validation->run('valid_edit_info')) {
                $this->mod_account->save_info($user_id);
                $this->session->set_flashdata('msg', 'Information Updated Successfully!');
                redirect('account/index');
            }
        }        
       
        $data=sql::row("users","user_id=$user_id");
        $data['dir']="account";
         $data['msg']= $this->session->flashdata('msg');
        $data['action']="account/";
        $data['page_banner'] = 'images/my-account.png';
        $data['page']="edit_info";
        $data['page_title'] = 'My Edit Your Account';
        $this->load->view('main',$data);

    }
    
    function account_password() {
        $user_id = $this->session->userdata('user_id');
        if ($_POST['change_password']) {
            if ($this->form_validation->run('valid_change_password')) {
                $data = array(
                    'user_password' => $_POST['user_password']
                );
                $this->db->update('users', $data, array('user_id' => $user_id));
                $this->session->set_flashdata('msg', 'Your Password changed Successfully!Please Login to see Your Account');
                $this->session->unset_userdata('user_id');
                $this->session->unset_userdata('logged_in');
                 $this->session->set_userdata('user_url','account');
                redirect('login');
            }
        }
        $data['msg'] = $this->session->flashdata('msg');
        $data['page_banner'] = 'images/change-password.png';
        $data['dir'] ='account';
        $data['page'] = 'change_password';
        $data['page_title'] = 'Change Password';
        $this->load->view('main', $data);
    }

    
    function is_valid_user_password() {
        if (!$this->mod_account->confirm_password()) {
            $this->form_validation->set_message('is_valid_user_password', 'Invalid Old Password');
            return false;
        } else {
            return true;
        }
    }
	
	 
    function edit_info(){
        $user_id=$this->session->userdata('user_id');
         $data['info']=sql::row('users',"user_id='$user_id'");
        if($_POST['submit']=='Submit'){
            $this->mod_account->save_info();
            redirect('account/profile');

        }
        else{
            if($_POST['cancel']=='Cancel'){
                redirect('account/profile');
            }
        }
        $data['user_info']=sql::row("users","user_id=$user_id");
        $data['dir']="account";
        $data['action']="account/edit_info";
        $data['page']="edit_info";
        //$data['current_page']="edit_info";
        $this->load->view('main',$data);

    }

    function edit_photo(){
        $id=$this->session->userdata('user_id');
        if($_POST['save']){
            echo $_POST[''];
            
                $this->mod_account->add_photo($id);
                $this->session->set_flashdata('msg','Image added Successfully!!!');
                redirect('account/profile');
        }
        $data['user_info']=sql::row("users","user_id=$id");
        $data['action']='account/edit_photo';
        $data['dir'] = 'blog';
        $data['page'] = 'edit_photo';
        $this->load->view('main', $data);
    }
    function profile(){
        $id= $this->session->userdata('user_id');
        $data['user_info']=sql::row("users","user_id=$id");
        $data['dir'] = 'blog';
        $data['page'] = 'write_blog';
        $this->load->view('main', $data);
    }

}
?>