<?php
class blog extends Controller {
    public function __construct() {
        parent::Controller();
        $this->load->Model("mod_blog");
    }
function index(){
        $this->load->library('pagination');
        $start = $this->uri->segment(3);
        $con = 1;
        if (!is_numeric($start)) {
            $start = 0;
        }
        $config['uri_segment'] =3;
        $config['base_url'] = site_url('blog/index');
        $config['total_rows'] = count($this->mod_blog->blog_info($con));
        $config['per_page'] = 5;
        $config['next_link'] = "Next &raquo;";
        $config['prev_link'] = "Previous";
        $config['page_query_string'] = false;
        $this->pagination->initialize($config);
        $data['pagination_links'] = $this->pagination->create_links();

        $data['blog_list'] = $this->mod_blog->blog_info($con, "limit $start,{$config['per_page']}"); //Don't Change

        if (count($data['blog_list']) > 0) {
            $data['start'] = $start + 1;
        } else {
            $data['start'] = 0;
        }
        $data['end'] = $start + count($data['blog_list']);
        $data['total'] = $config['total_rows'];
        $data['dir'] = 'blog';
        $data['page'] = 'index';
        $this->load->view('main', $data);

    }

function write_blog() {
        if($_POST['save']){
            $this->mod_blog->save_blog();
            redirect('blog');
        }
        $data['editor']=TRUE;
        $data['action']="blog/write_blog";
        $data['dir'] = 'blog';
        $data['page'] = 'write_blog';
        $this->load->view("main", $data);
    }
    function view_my_blog() {
        $id=  $this->session->userdata('user_id');
        $data['blog_list']=sql::rows("blog","user_id=$id");
        $data['dir'] = 'blog';
        $data['page'] = 'view_my_blog';
        $this->load->view("main", $data);
    }

    function blog_description($id=''){
        $user_id=$this->session->userdata('user_id');
        $data['blog_detail']=sql::row("blog","blog_id=$id");
        $this->db->query("update blog set view=view+1 where blog_id='$id'");
        if($_POST['submit']){
         //   common::is_logged();
            $this->mod_blog->save_comment($id);
            redirect('blog/blog_description/'.$id);
        }

        if($_POST['edit']){
        //    common::is_logged();
            redirect('blog/edit_blog/'.$id);
        }

        $data['blog_comment']=sql::rows("blog_comment","blog_id=$id");
//        print_r($data['blog_comment']);exit;
        if($_POST['remove']){
//           common::is_logged();
            if($data['blog_detail']['user_id']==$user_id){
            sql::delete("blog","blog_id=$id");

            }

            redirect("blog");
        }
        $data['dir'] = 'blog';
        $data['action']="blog/blog_description/".$id;
        $data['page'] = 'blog_description';
        $this->load->view("main", $data);
    }

    function edit_blog($id=''){
        if($_POST['save']){
            $this->mod_blog->update_blog($id);
            redirect('blog');
        }
        $data['editor']=TRUE;
        $data['blog_data']=sql::row("blog","blog_id=$id");
        $data['action']="blog/edit_blog/".$id;
        $data['dir'] = 'blog';
        $data['page'] = 'edit_blog';
        $this->load->view("main", $data);
    }


}
?>