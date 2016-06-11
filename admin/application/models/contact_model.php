<?php

class contact_model extends Model {

    function _construct() {
        parent::_construct();
    }

    function get_contact_listing() {
        $sortname = common::getVar('sidx', 'contact_date');
        $sortorder = common::getVar('sord', 'desc');
        $sort = "ORDER BY $sortname $sortorder";
        $con.=" 1";
        $searchField = common::getVar('searchField');
        $searchValue = common::getVar('searchValue');

        if ($_REQUEST['name'] != '') {
            $con.=" and contact_name like '%$_REQUEST[name]%'";
        }
        if ($_REQUEST['subject'] != '') {
            $con.=" and contact_subject like '%$_REQUEST[subject]%'";
        }
        if ($_REQUEST['message'] != '') {
            $con.=" and contact_message like '%$_REQUEST[contact_message]%'";
        }
        $sql = "select * from contact where  $con $sort";

        $page = common::getVar('page', 1);
        $limit = common::getVar('rows');
        $query = $this->db->query($sql);
        $count = count($query->result_array());
        if ($count > 0) {
            $total_pages = ceil($count / $limit);
        } else {
            $total_pages = 0;
        }
        if ($page > $total_pages)
            $page = $total_pages;

        if ($limit < 0)
            $limit = 0;
        $start = $limit * $page - $limit;
        if ($start < 0)
            $start = 0;

        $sql_query = $this->db->query($sql . " limit $start, $limit");
        $rows = $sql_query->result_array();
        $i = 0;
        $responce->page = $page;
        $responce->total = $total_pages;
        $responce->records = $count;
        foreach ($rows as $row) {
            $responce->rows[$i]['id'] = $row['contact_id'];
            $date=date("d/m/Y", strtotime($row['contact_date'])) . ' at ' . date("g:i:s A", strtotime($row['contact_date']));            
            $responce->rows[$i]['cell'] = array($date, $row['contact_name'], $row['contact_email'], $row['contact_subject'], $row['contact_message'],$row['reply_date']=='0000-00-00 00:00:00'?'':$row['reply_date']);
            $i++;
        }
        header("Expires: Sat, 17 Jul 2010 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
        header("Cache-Control: no-cache, must-revalidate");
        header("Pragma: no-cache");
        header("Author: Md. Anwar Hossain");
        header("Email: anwarworld@gmail.com");
        header("Content-type: text/x-json");
        echo json_encode($responce);
        return '';
    }

    function delete_contact($id='') {
        $this->db->delete("contact", array('contact_id' => $id));
        return true;
    }

    function reply($id='') {
        $this->db->update("contact",array('reply'=>1,'reply_date'=>date('Y-m-d h:i:s')),array('contact_id'=>$id));
        $site = common::get_settings_data();
        $from = $site['admin_email'];
        $from_name = 'Doctors Portal';
        $to = $_POST['contact_email'];
        $subject =$_POST['contact_subject'];
        $msg = $_REQUEST['contact_message'];
        common::sending_mail($from, $from_name, $to, $subject, $msg);
        return true;
    }

}
?>
