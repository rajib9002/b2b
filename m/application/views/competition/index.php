<script type="text/javascript" src="script/jquery-1.6.4.min.js"></script>
<script type="text/javascript" src="script/jquery.fancybox.js?v=2.0.6"></script>
<link rel="stylesheet" type="text/css" href="styles/jquery.fancybox.css?v=2.0.6" media="screen" />

<script type="text/javascript">
    $(document).ready(function () {
        $('.fancybox').fancybox();
    });
</script>


<script type="text/javascript">
    function calender_ajax(mon, step) {
//alert(mon);
        $j.ajax({
            type: 'POST',
            url: base_url + "competition/calender_ajax",
            data: {
                mon_r: mon,
                step_r: step
            },
            success: function(html) {
                //$j('.remove_in_ajax').remove();
                $j('.calender').html(html);
            }
        });
    }
</script>




<style type="text/css">
    .fancybox-custom .fancybox-skin {
        box-shadow: 0 0 50px #222;
    }
    .competition_table{
        width:100%;margin-left:0;
    }
    .competition_table table{
        margin-bottom:20px;
        border-right: 1px solid #d7d7d7;
    }


table{margin:0;padding:0;border:0;}
	
	.calender_design{
		border-left:1px solid #0059ac;
	}
	
	.calender_design tr th{background-color:#0059ac;padding:3px 5px;border-right:1px solid #0059ac;border-bottom:1px solid #0059ac;color:#fff;height:25px;  font-weight: normal;}
.calender_design tr td{font-size:13px;padding:5px 2px;background-color:#fff;border-right:1px solid #0059ac;border-bottom:1px solid #0059ac;text-align: center;vertical-align:middle;width:30px;}

	
</style>

<!--<div class="step2_upper" style="width: 50%;float: left">
    <h2>Competition Date & Venues</h2>
    <h3></h3>

</div>
<div style=" width: 35%;float: right;padding: 45px 20px 0 30px;">
    <span class="float_right">
        <form action="" method="post">
            <select name="country_id" class="select-style2" style="width:200px; height: 30px; border-radius:0px; -webkit-border-radius:0; moz-border-radius: 0px;" >
<? //= common::get_country_options($_REQUEST['country_id']) ?>
            </select>
            <input class="search_top"  type="submit" name="search" value="SEARCH"/>

        </form>
    </span>

</div>-->


<div class="calender">

<?php echo $str?>

</div>

<div class="clear"></div>
<?php
$inc = 1;
count($all_info);
foreach ($all_info as $info) {
    ?>
    <!--    <div style="width:100%; background: #041626; padding: 5px 0; margin-top: 10px;">    
            <h1 style="color: #fff; font-family: arial; font-size: 20px; margin-left: 30px"> Competition of <?= $info['year'] ?></h1>
        </div>-->

    <div style="width:100%; background: #0059ac; padding: 5px 0; float: left;margin-top:5px;">    
        <h1 style="color: #fff; font-family: arial; font-size: 18px; margin-left: 30px; text-align: center;text-transform: uppercase;float:left;width:150px;text-align: left;"> Amateur <?php echo common::get_discipline_name($info['discipline_id']) ?></h1>

        <select name="year" class="select-style2" style="width:100px; height: 30px; border-radius:0px; -webkit-border-radius:0; moz-border-radius: 0px;float:left;margin-top:8px" >
            <?= common::get_year($_REQUEST['year']) ?>
        </select>

    </div>
    <div class="clear"></div>

    <div class="competition_table">
        <table cellspacing="0">
            <?php
            $con = "competitionr_details.year='$info[year]'";
            //$con.=" and discipline_id=$info[discipline_id]";

            if ($_REQUEST['country_id'] != '') {
                $country_id = $_REQUEST['country_id'];
                $con.=" and competitionr.competitionr_country=$country_id";
            }

            $query = $this->db->query("                
                    Select Distinct competitionr.competitionr_id, competitionr.competitionr_name,competitionr.category_id,competitionr_details.year from competitionr
                    left join competitionr_details on competitionr_details.competitionr_id=competitionr.competitionr_id where $con
               ");
            $competition_info = $query->result_array();
            ?>

            <?php foreach ($competition_info as $c) { ?>
                <tr <?php if ($inc % 2 == 0) { ?> class="even" <?php } else { ?> class="odd"<?php } ?>>


                    <?php if ($c['category_id'] == 1) { ?>
                        <th>  <a class="fancybox fancybox.iframe" href="<?php echo site_url('competition/details/' . $c['competitionr_id'] . '/' . $c['year']) ?>" title="<?php echo $c['competitionr_name'] ?>"><?php echo substr($c['competitionr_name'], 0, 30) ?></a> </th>
                        <td>   <?php $result = sql::row("competition_result", "competition_id='$c[competitionr_id]'  and year='$c[year]'"); ?>
                            <?php if (count($result) > 0) { ?>
                                <p><a class="fancybox fancybox.iframe" href="<?php echo site_url('competition/details/' . $c['competitionr_id'] . '/' . $c['year']) ?>" style="color:#565759">Result</a></p>
                            <?php } else { ?> <p><a href="javascript::void(0)" style="color:#565759">&nbsp;</a></p><?php } ?>
                        </td>

                    <?php } ?>



                </tr>



                <?php
                $inc++;
            }
            ?>




        </table>
    </div>






    <div style="width:100%; background: #2d95f6; padding: 5px 0; float: left;margin-top:5px;">    
        <h1 style="color: #fff; font-family: arial; font-size: 18px; margin-left: 30px;text-align: center; text-transform: uppercase"> Professional <?php echo common::get_discipline_name($info['discipline_id']) ?></h1>
    </div>


    <div class="clear"></div>

    <div class="competition_table">
        <table cellspacing="0">
            <?php
            $con = "competitionr_details.year='$info[year]'";
            //$con.=" and discipline_id=$info[discipline_id]";

            if ($_REQUEST['country_id'] != '') {
                $country_id = $_REQUEST['country_id'];
                $con.=" and competitionr.competitionr_country=$country_id";
            }

            $query = $this->db->query("                
                    Select Distinct competitionr.competitionr_id, competitionr.competitionr_name,competitionr.category_id,competitionr_details.year from competitionr
                    left join competitionr_details on competitionr_details.competitionr_id=competitionr.competitionr_id where $con
               ");
            $competition_info = $query->result_array();
            ?>

                <?php foreach ($competition_info as $c) { ?>
                <tr <?php if ($inc % 2 == 0) { ?> class="even" <?php } else { ?> class="odd"<?php } ?>>
        <?php if ($c['category_id'] == 2) { ?>
                        <th> &nbsp;</th>
                        <td style="border-right: 1px solid #d7d7d7;">&nbsp;</td>
                        <th>  <a class="fancybox fancybox.iframe" href="<?php echo site_url('competition/details/' . $c['competitionr_id'] . '/' . $c['year']) ?>" title="<?php echo $c['competitionr_name'] ?>"><?php echo substr($c['competitionr_name'], 0, 30) ?></a> </th>
                        <td>   <?php $result = sql::row("competition_result", "competition_id='$c[competitionr_id]' and year='$c[year]'"); ?>
                            <?php if (count($result) > 0) { ?>
                                <p><a class="fancybox fancybox.iframe" href="<?php echo site_url('competition/details/' . $c['competitionr_id'] . '/' . $c['year']) ?>" style="color:#565759">Competition Result</a></p>
                        <?php } else { ?> <p><a href="javascript::void(0)" style="color:#565759"> Not Published</a></p><?php } ?>
                        </td>
                <?php } ?>
                </tr>
                <?php
                $inc++;
            }
            ?>
        </table>
    </div>
    <?php
}
?>
    <?php if ($pagination_links) { ?>
    <div class="paginationTwo" style="margin-bottom: 40px; float: right; margin-right: 20px;">
    <?php echo $pagination_links; ?>
    </div>
<?php } ?>




