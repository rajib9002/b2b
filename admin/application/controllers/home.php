<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of home
 *
 * @author Anwar
 */
class home extends Controller {

    function __construct() {
        parent::Controller();
        common::is_logged();
        $this->load->model('ads_model');
    }

    function index() {
//        $data['home_title'] = common::get_settings_data();
//        $msg = "<div style='width:700px;font-family:trebuchet ms;color:#343434;font-size:13px;'>";
//        $msg.="Thank You for Your Support in Bike_ad.
//                        <br /><br />Your Ad Will be Remove Soon From Our Site
//                        <br />Thank you,
//                        <br />Bike_ad Account Support";
//        $msg_content.='</div>';
//        $from = $data['home_title']['admin_email'];
//        $from_name = 'Bike_ad Admin';
//        $subject = 'Ad Remove Notification';
//        $mail_list = $this->ads_model->get_mail_lilst();
//        foreach ($mail_list as $notify_mail):
//            common::sending_mail($from, $from_name, $notify_mail['user_mail'], $subject, $msg);
//            $bike_data = array('send_mail_status' => 1, 'bike_status' => 0);
//            $this->db->update('bike', $bike_data, array('bike_id' => $notify_mail['bike_id']));
//        endforeach;
        $data['dir'] = 'home';
        $data['page'] = 'index';
        $this->load->view('main', $data);
    }

    function load_result_data() {
        $sql = $this->db->query("select * from rider where class_id='$_POST[class_id]' and competitionr_id='$_POST[competitionr_id]'");
        $data = $sql->result_array();
        $html = "";
        if (count($data) > 0) {
            $inc = 0;
            foreach ($data as $row) {
                $html.='<tr>';
                $html.='<td><input type="text" class="text ui-widget-content ui-corner-all width_60"  name="position[]" value=""/>
                <input type="hidden" name="pro_serial[]" value=""/>
            </td>';
                $html.='<td><input type="text" class="text ui-widget-content ui-corner-all width_60" name="start[]" value="' . $row[rider_number] . '" /></td>
        <td><input type="text" class="text ui-widget-content ui-corner-all width_150" name="competitor[]" value="' . $row[rider_first_name] . ' ' . $row[rider_last_name] . '" /></td>
        <td><input type="text" class="text ui-widget-content ui-corner-all width_60" name="r1_score[]" value="" id="jr1_score_' . $inc . '" onkeyup="common.getTotal_data(' . $inc . ')"/></td>
        <td><input type="text" class="text ui-widget-content ui-corner-all width_60" name="r2_score[]" value="" id="jr2_score_' . $inc . '" onkeyup="common.getTotal_data(' . $inc . ')" /></td>
        <td><input type="text" class="text ui-widget-content ui-corner-all width_60" name="r3_score[]" value="" id="jr3_score_' . $inc . '" onkeyup="common.getTotal_data(' . $inc . ')"/></td>
        <td><input type="text" class="text ui-widget-content ui-corner-all width_60" name="r4_score[]" value="" id="jr4_score_' . $inc . '" onkeyup="common.getTotal_data(' . $inc . ')"/></td>
        <td><input type="text" class="text ui-widget-content ui-corner-all width_60" name="r5_score[]" value="" id="jr5_score_' . $inc . '" onkeyup="common.getTotal_data(' . $inc . ')"/></td>
        <td><input type="text" class="text ui-widget-content ui-corner-all width_60" name="r6_score[]" value="" id="jr6_score_' . $inc . '" onkeyup="common.getTotal_data(' . $inc . ')"/></td>
        <td><input type="text" class="text ui-widget-content ui-corner-all width_60" name="r7_score[]" value="" id="jr7_score_' . $inc . '" onkeyup="common.getTotal_data(' . $inc . ')"/></td>
        <td><input type="text" class="text ui-widget-content ui-corner-all width_60" name="total[]" id="total_' . $inc . '" value="" /></td>
';
                $html.='</tr>';
                $inc++;
            }
        }
        echo $html;
    }

    function get_competitionr_options($sel = '') {
        $sql = $this->db->query("select * from competitionr where competitionr_status =1 order by competitionr_name asc");
        $data = $sql->result_array();
        $rows = $data;
        $opt = '<option value="">Select Competiton Name</option>';
        foreach ($rows as $value) {
            if ($value['competitionr_id'] == $sel) {
                $opt.='<option value="' . $value['competitionr_id'] . '" selected="selected">' . $value['competitionr_name'] . '</option>';
            } else {
                $opt.='<option value="' . $value['competitionr_id'] . '">' . $value['competitionr_name'] . '</option>';
            }
        }
        echo $opt;
    }   

}

?>
