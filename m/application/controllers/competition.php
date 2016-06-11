<?php

class competition extends Controller {

    var $dir = "competition";

    public function __construct() {
        parent::__construct();
        $this->load->model("mod_competition");
    }

    function index() {


if ($step == 1) {
            if ($mon == 1) {
                $year = $this->session->userdata('next_year');
                $year = $year + 1;
                $this->session->set_userdata('next_year', "$year");
                $data['prev'] = 12;
                $data['next'] = $mon + 1;
            } else if ($mon == 12) {
                $year = $this->session->userdata('next_year');
                if ($year == '') {
                    $year = date('Y');
                }
                $data['prev'] = $mon - 1;
                $data['next'] = 1;
            } else {
                $year = $this->session->userdata('next_year');
                if ($year == '') {
                    $year = date('Y');
                }
                $data['prev'] = $mon - 1;
                $data['next'] = $mon + 1;
            }
        }
        if ($step == 0) {
            if ($mon == 1) {
                $year = $this->session->userdata('next_year');
                if ($year == '') {
                    $year = date('Y');
                }
                $data['prev'] = 12;
                $data['next'] = $mon + 1;
            } else if ($mon == 12) {
                $year = $this->session->userdata('next_year');
                $year = $year - 1;
                $this->session->set_userdata('next_year', "$year");
                $data['prev'] = $mon - 1;
                $data['next'] = 1;
            } else {
                $year = $this->session->userdata('next_year');
                if ($year == '') {
                    $year = date('Y');
                }
                $data['prev'] = $mon - 1;
                $data['next'] = $mon + 1;
            }
        }
        if ($mon == '') {
            $mon = date('m');
            if ($mon == 1) {
                $year = date('Y');
                $this->session->set_userdata('next_year', "$year");
                $data['prev'] = 12;
                $data['next'] = $mon + 1;
            } else if ($mon == 12) {
                $year = date('Y');
                $this->session->set_userdata('next_year', "$year");
                $data['prev'] = $mon - 1;
                $data['next'] = 1;
            } else {
                $year = date('Y');
                $this->session->set_userdata('next_year', "$year");
                $data['prev'] = $mon - 1;
                $data['next'] = $mon + 1;
            }
        }
        $date = time();
        $day = date('d', $date);
        $month = $mon;
        $first_day = mktime(0, 0, 0, $month, 1, $year);
        $title = date('F', $first_day);
        $day_of_week = date('D', $first_day);
        switch ($day_of_week) {
            case "Sun": $blank = 0;
                break;
            case "Mon": $blank = 1;
                break;
            case "Tue": $blank = 2;
                break;
            case "Wed": $blank = 3;
                break;
            case "Thu": $blank = 4;
                break;
            case "Fri": $blank = 5;
                break;
            case "Sat": $blank = 6;
                break;
        }
        $days_in_month = cal_days_in_month(0, $month, $year);
        $str = '<table class="calender_design" border="0" width="100%" height="260"  cellpadding="0" cellspacing="0" style="position:relative;margin-top:15px;">
            <tr>
               <th colspan="7">' . $title . ' ' . $year . ' 
                   <a style="position:absolute;left:5px;top:5px;" onclick=calender_ajax(' . $data[prev] . ',0) href="javascript:void(0)""><img  src="' . base_url() . '/images/p.png"></a>
                    <a  style="position:absolute;right:5px;top:5px;" onclick=calender_ajax(' . $data[next] . ',1) href="javascript:void(0)"><img  src="' . base_url() . '/images/n.png"></a>
           

</th> 
                    </tr>';
        $str.='<tr><td>Su </td> <td>Mo </td><td>Tu</td> <td>We</td> <td>Th</td> <td>Fr</td> <td>Sa</td></tr>';
        $days_coun = 1;
        $str.="<tr>";
        while ($blank > 0) {
            $str.='<td></td>';
            $blank = $blank - 1;
            $days_coun++;
        }
        $days_num = 1;
        $ff = '';
        $bg = '';
        while ($days_num <= $days_in_month) {
            if (strlen($days_num) == 1) {
                $da_val = '0' . $days_num;
            } else {
                $da_val = $days_num;
            }
            if (strlen($month) == 1) {
                $mon = '0' . $month;
            } else {
                $mon = $month;
            }
            $ff = '';
            $bg = '';
            $request_date = $year . '-' . $mon . '-' . $da_val;


            $is_exist_game=sql::rows("competitionr_details","competitionr_details_date='$request_date'");

if(count($is_exist_game)>0){
$color='style="background-color:#44a627;"';
}else{
$color='style="background-color:#fff;"';
}


            $str.='<td ' . $color . ' ><a class="fancybox fancybox.iframe" style="color:#000;display:block;" href=" ' . site_url('competition/details_date/' . $request_date) . '">' . $days_num;
            $day_name = date('D', strtotime($request_date));
            if ($day_name != 'Sat' && $day_name != 'Sun') {
                //$str.='<input ' . $ff . ' class="datecheckbox" type="checkbox" name="request_date[]" value="' . $year . '-' . $mon . '-' . $da_val . '" id="' . $month . '_' . $days_num . '" onclick="days_chek(this)"  />';
                $str.='<label for="' . $month . '_' . $days_num . '" style="font-size:14px;"></label>';
            }
            $str.='</td>';
            $days_num++;
            $days_coun++;
            if ($days_coun > 7) {
                $str.='</tr><tr>';
                $days_coun = 1;
            }
        }
        while ($days_coun > 1 && $days_coun <= 7) {
            $str.='<td></td>';
            $days_coun++;
        }
        $str.="</tr></table><br>
                <input type='hidden' name='leave_val' id='leave_val' value='$dtvalck' />
                <input type='hidden' name='work_day' id='work_day' value='' />
                ";
        $data['str'] = $str;










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




function calender_ajax() {
$step=$_POST['step_r'];
$mon=$_POST['mon_r'];

if ($step == 1) {
            if ($mon == 1) {
                $year = $this->session->userdata('next_year');
                $year = $year + 1;
                $this->session->set_userdata('next_year', "$year");
                $data['prev'] = 12;
                $data['next'] = $mon + 1;
            } else if ($mon == 12) {
                $year = $this->session->userdata('next_year');
                if ($year == '') {
                    $year = date('Y');
                }
                $data['prev'] = $mon - 1;
                $data['next'] = 1;
            } else {
                $year = $this->session->userdata('next_year');
                if ($year == '') {
                    $year = date('Y');
                }
                $data['prev'] = $mon - 1;
                $data['next'] = $mon + 1;
            }
        }
        if ($step == 0) {
            if ($mon == 1) {
                $year = $this->session->userdata('next_year');
                if ($year == '') {
                    $year = date('Y');
                }
                $data['prev'] = 12;
                $data['next'] = $mon + 1;
            } else if ($mon == 12) {
                $year = $this->session->userdata('next_year');
                $year = $year - 1;
                $this->session->set_userdata('next_year', "$year");
                $data['prev'] = $mon - 1;
                $data['next'] = 1;
            } else {
                $year = $this->session->userdata('next_year');
                if ($year == '') {
                    $year = date('Y');
                }
                $data['prev'] = $mon - 1;
                $data['next'] = $mon + 1;
            }
        }
        if ($mon == '') {
            $mon = date('m');
            if ($mon == 1) {
                $year = date('Y');
                $this->session->set_userdata('next_year', "$year");
                $data['prev'] = 12;
                $data['next'] = $mon + 1;
            } else if ($mon == 12) {
                $year = date('Y');
                $this->session->set_userdata('next_year', "$year");
                $data['prev'] = $mon - 1;
                $data['next'] = 1;
            } else {
                $year = date('Y');
                $this->session->set_userdata('next_year', "$year");
                $data['prev'] = $mon - 1;
                $data['next'] = $mon + 1;
            }
        }
        $date = time();
        $day = date('d', $date);
        $month = $mon;
        $first_day = mktime(0, 0, 0, $month, 1, $year);
        $title = date('F', $first_day);
        $day_of_week = date('D', $first_day);
        switch ($day_of_week) {
            case "Sun": $blank = 0;
                break;
            case "Mon": $blank = 1;
                break;
            case "Tue": $blank = 2;
                break;
            case "Wed": $blank = 3;
                break;
            case "Thu": $blank = 4;
                break;
            case "Fri": $blank = 5;
                break;
            case "Sat": $blank = 6;
                break;
        }
        $days_in_month = cal_days_in_month(0, $month, $year);
        $str = '<table class="calender_design" border="0" width="100%" height="260"  cellpadding="0" cellspacing="0" style="position:relative;margin-top:15px;">
            <tr>
               <th colspan="7">' . $title . ' ' . $year . ' 
                   <a style="position:absolute;left:5px;top:5px;" onclick=calender_ajax(' . $data[prev] . ',0) href="javascript:void(0)""><img  src="' . base_url() . '/images/p.png"></a>
                    <a  style="position:absolute;right:5px;top:5px;" onclick=calender_ajax(' . $data[next] . ',1) href="javascript:void(0)"><img  src="' . base_url() . '/images/n.png"></a>
           

</th> 
                    </tr>';
        $str.='<tr><td>Su </td> <td>Mo </td><td>Tu</td> <td>We</td> <td>Th</td> <td>Fr</td> <td>Sa</td></tr>';
        $days_coun = 1;
        $str.="<tr>";
        while ($blank > 0) {
            $str.='<td></td>';
            $blank = $blank - 1;
            $days_coun++;
        }
        $days_num = 1;
        $ff = '';
        $bg = '';
        while ($days_num <= $days_in_month) {
            if (strlen($days_num) == 1) {
                $da_val = '0' . $days_num;
            } else {
                $da_val = $days_num;
            }
            if (strlen($month) == 1) {
                $mon = '0' . $month;
            } else {
                $mon = $month;
            }
            $ff = '';
            $bg = '';
            $request_date = $year . '-' . $mon . '-' . $da_val;


        $is_exist_game=sql::rows("competitionr_details","competitionr_details_date='$request_date'");

if(count($is_exist_game)>0){
$color='style="background-color:#44a627;"';
}else{
$color='style="background-color:#fff;"';
}


            $str.='<td ' . $color . ' ><a class="fancybox fancybox.iframe" style="color:#000;display:block;" href=" ' . site_url('competition/details_date/' . $request_date) . '">' . $days_num;
            $day_name = date('D', strtotime($request_date));
            if ($day_name != 'Sat' && $day_name != 'Sun') {
                //$str.='<input ' . $ff . ' class="datecheckbox" type="checkbox" name="request_date[]" value="' . $year . '-' . $mon . '-' . $da_val . '" id="' . $month . '_' . $days_num . '" onclick="days_chek(this)"  />';
                $str.='<label for="' . $month . '_' . $days_num . '" style="font-size:14px;"></label>';
            }
            $str.='</td>';
            $days_num++;
            $days_coun++;
            if ($days_coun > 7) {
                $str.='</tr><tr>';
                $days_coun = 1;
            }
        }
        while ($days_coun > 1 && $days_coun <= 7) {
            $str.='<td></td>';
            $days_coun++;
        }
        $str.="</tr></table><br>
                <input type='hidden' name='leave_val' id='leave_val' value='$dtvalck' />
                <input type='hidden' name='work_day' id='work_day' value='' />
                ";
       // $data['str'] = $str;

echo $str;
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

 function details_date($date = '') {
        $data['description'] = $this->mod_competition->get_all_competition_details_date($date);
        $data['com_all'] = '';
        //print_r($data['description']);
        $data['page_title'] = "Competition Details";
        $data['dir'] = "competition";
        $data['page'] = 'details_date';
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
$data['t_year']=$year;
        $data['page_title'] = "Competition Result";
        $data['dir'] = "competition";
        $data['page'] = 'total_result';
        $this->load->view("main_popup", $data);
    }
    
    

}

?>