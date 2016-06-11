<?php

class mod_blog extends Model {
    public function __construct() {
        parent::Model();
    }
    function blog_info($con='1',$limit='') {
        $sql="select * from blog where $con and blog_status=1 order by blog_id desc $limit";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

	function blog_user_login() {
        $data = array(
            'name' => $_POST['name'],
            'password' => $_POST['password']
        );
        $sql="select user_name,user_password from users where ";

        $this->db->insert("test", $data);
    }

    function get_profile_pic($blog_id=''){
        
        $sql="select users.*, blog.* from users left join blog on
              blog.user_id=users.user_id where blog.blog_id=$blog_id";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

     function get_commenter_pic($blog_id='', $comment_id=''){
        $sql="select blog_comment.*,users.user_image from users left join blog_comment on
              blog_comment.user_id=users.user_id
              where blog_comment.blog_id=$blog_id and blog_comment.id=$comment_id";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

     function save_blog(){
        $user_id=$this->session->userdata('user_id');
        $data = array(
            "user_id"=>$user_id,
            "title" => $_POST['title'],
            "blog_description" => $_POST['description'],
            "blog_status" => 1

        );

        $this->db->insert("blog", $data);

        return;
    }

    //save comment
    function save_comment($blog_id='')
    {
       // $temp=$id;

        $user_id=$this->session->userdata('user_id');
        //$data['info']=  $this->db->row("blog",'user_id');
        //$data['info']=sql::row("blog","user_id=$id");



        $data = array(
            'blog_id' => $blog_id,
            'user_id'=>$user_id,
            'comment'=>$_POST['comment']

        );

        $this->db->insert("blog_comment",$data);
    }

    function  get_user_name($id='')
    {
        $sql="select user_name from users where user_id='$id'";
         $query = $this->db->query($sql);
        return $query->row_array();
    }

    function update_blog($id=''){
        $user_id=$this->session->userdata('user_id');
        $data = array(
            "user_id"=>$user_id,
            "title" => $_POST['title'],
            "blog_description" => $_POST['description']

        );

        $this->db->update("blog", $data,$data=array("blog_id"=>$id));

        return;
    }


}
?>