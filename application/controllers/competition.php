<?php

class competition extends Controller {

    var $dir = "competition";

    public function __construct() {
        parent::__construct();
        $this->load->model("mod_competition");
    }

    function index() {
        $this->load->library('pagination');
        $start = $this->uri->segment(3);
        $con = 1;
        if (!is_numeric($start)) {
            $start = 0;
        }
        $config['uri_segment'] = 3;
        $config['base_url'] = site_url('competition/index');
        $config['total_rows'] = count($this->mod_competition->get_all_competition());
        $config['num_links'] = 10;
        $config['per_page'] = 1;
        $config['next_link'] = "&laquo; Previous Year";
        $config['prev_link'] = "Next Year &raquo;";
        $config['page_query_string'] = false;
        $this->pagination->initialize($config);
        $data['pagination_links'] = $this->pagination->create_links();

        $data['all_info'] = $this->mod_competition->get_all_competition($limit = true, $start, $config['per_page']); //Don't Change
        if (count($data['all_info']) > 0) {
            $data['start'] = $start + 1;
        } else {
            $data['start'] = 0;
        }
        $data['end'] = $start + count($data['all_info']);
        $data['total'] = $config['total_rows'];
        $data['title'] = '';
        $data['dir'] = 'competition';
        $data['page'] = 'index';
        $this->load->view("login_with_top", $data);
    }

   function details($id='',$year='') {
        $data['description'] = $this->mod_competition->get_all_competition_details($id,$year);
		$data['com_all']=$this->mod_competition->get_all_class_data($id,$year);
        //print_r($data['description']);
        $data['page_title'] = "Competition Details";
        $data['dir'] = "competition";
        $data['page'] = 'details';
        $this->load->view("main_popup", $data);
    }
    
    
      function result($year='',$id='',$round_name='',$c_id='') {
        
          $data['com_all']=$this->mod_competition->get_all_class_data($id,$year);
        $this->session->set_userdata('round_name',$round_name);
        $this->session->set_userdata('id',$id); 
        $con='1';
         if(isset($_POST['search'])){
             $class_id=$_POST['class_id'];
             $con.=" and class_id='$class_id' ";
             $data['class_id_n']=$class_id;
         }
         else{
             if($c_id!=''){
                 $con.=" and class_id='$c_id' ";
             }
             
         }
        
        $data['total_class']=sql::rows('competitor',"$con and round_id='$round_name' and competition_id=$id and year='$year'  group by class_id asc","class_id");
        $data['com_id']=$id;
        //print_r($data['total_class']);
      $data['r_year']=$year;
        $data['page_title'] = "Competition Result";
        $data['dir'] = "competition";
        $data['page'] = 'result';
        $this->load->view("main_popup", $data);
    }
    
    
    //function total_result($id='') {
      //   $con='1';
      //   if(isset($_POST['search'])){
      //       $class_id=$_POST['class_id'];
      //       $con.=" and competitor.class_id='$class_id' ";
		//	 $data['class_id_n']=$class_id;
       //  }
      //  $data=$this->mod_competition->get_all_competition_total_result($id);
      //  $data['description'] = sql::rows('competitor',"$con and competition_id=$id  group by competitor order by t desc","sum(total) as t,competitor,start");
      //  $data['com_id']=$id;

//print_r($data['description']);
     //   $data['page_title'] = "Competition Result";
     //   $data['dir'] = "competition";
     //   $data['page'] = 'total_result';
    //    $this->load->view("main_popup", $data);
   // }
   
    function total_result($year='',$id='',$c_id='') {
        $data=$this->mod_competition->get_all_competition_total_result($id,$year);
        $data['count_info']=sql::rows('competition_result',"competition_id=$id and year='$year' group by round_id","round_id");
		
		
		$data['com_all']=$this->mod_competition->get_all_class_data($id,$year);
		
		
         $con='1';
		 if(isset($_POST['search'])){
             $class_id=$_POST['class_id'];
             $con.=" and class_id='$class_id' ";
             $data['class_id_n']=$class_id;
         }
         else{
             if($c_id!=''){
                 $con.=" and class_id='$c_id' ";
             }
         }
		 
		 
         $data['total_class']=sql::rows('competitor',"$con and competition_id=$id and year='$year' group by class_id asc","class_id");
        $data['com_id']=$id;
        $data['page_title'] = "Competition Result";
        $data['dir'] = "competition";
        $data['page'] = 'total_result';
        $this->load->view("main_popup", $data);
    }
    
    

}

?>