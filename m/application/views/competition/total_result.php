<script type="text/javascript" src="scripts/jquery-1.6.4.min.js"></script>
<div style="margin:10px 10px;">



    <p style="font-family: verdana;font-size: 20px;color:#000; width: 100%; float: left; margin-top: 10px"><?php echo $competitionr_name ?></p>


    
    

    <div class="button_complete" style="width:150px;float:left;margin-top: 10px;"><a href="<?php echo site_url('competition/total_result/'.$t_year.'/'  . $com_id) ?>">Complete Result</a></div>

<span style="text-align:left;float: right; margin-top: 10px; margin-right: 10px">
        <a class="next_previous_button" style="padding: 2px 10px" href="" onclick='window.history.back();'>< Back  </a>
    </span>

<div class="clear"></div>
    <div class="class_nav_all" style="float:left;margin:0;margin-top:10px;padding:0;">
        <?php foreach ($com_all as $com) { ?>
            <a href="<?php echo site_url('competition/total_result/'.$t_year.'/'  . $com_id . '/' . $com['class_id']) ?>"><?php echo $com['rider_class_name']; ?></a>
        <?php } ?>
    </div>
    <div class="clear"></div>   

    <div class="clear"></div> 
    <!--<form action="" method="post"><p><select class="select-style2" name="class_id"><?= common::get_class_options($_REQUEST['class_id']) ?></select></p>
        <input type="submit" name="search" value="search"/>
    </form>

    <div class="clear"></div> -->



    <br/>
<style>
ul.first li{padding-left:0;padding-right:0;height:30px;}
ul.first li a{font-size:11px;height:30px;}
</style>


    <?php foreach ($total_class as $total_class) { ?>


        <div class="clear"></div>
        <?php
        $class_id = $total_class['class_id'];
        $c_name = sql::row("rider_class", "rider_class_id=$class_id", "rider_class_name");

        echo '<div style="font-family: verdana;font-size: 16px; background: #041626; color:#fff;padding:5px 10px; margin: 0;text-align:center;">' . $c_name['rider_class_name'] . '</div>';

        $d_status_new = sql::row("competition_result", "competition_id =$com_id AND class_id =$class_id GROUP BY class_id", "drop_status");

        if ($d_status_new['drop_status'] == 2) {
            $sort = 'new_total';
        } else {
            $sort = 't';
        }

        $description = sql::rows('competitor', "class_id=$class_id and competition_id=$com_id  group by competitor order by $sort desc", "sum(total) as t,competitor,start,new_total");
        ?>


        <div class="clear"></div>

        <ul class="first">
            <li><a style="background: #0059ac; color: #fff; font-family: arial; text-align: center;text-transform: uppercase;width:25px" href="javascript::void(0)">&nbsp;</a></li>
            <!--<li><a style="background: #0059ac; color: #fff; font-family: arial; text-align: center;text-transform: uppercase;width:25px" href="javascript::void(0)">Start</a></li>-->
            <li><a style="background: #0059ac; color: #fff; font-family: arial; text-align: center;text-transform: uppercase;width:70px" href="javascript::void(0)">Rider</a></li>

            <?php
            $d_status = sql::row('competition_result', "class_id=$class_id and competition_id=$com_id", "drop_status");
            ?>

            <?php $i = 1;
            foreach ($count_info as $info) { ?>
                    <!--<li><a style="width:20px" href="javascript::void(0)"><?php echo $info['round_id'] ?></a></li>-->
                <?php if ($i == 1) { ?>
                    <? if ($d_status['drop_status'] == 2) { ?>
                        <li><a style="background: #0059ac; color: #fff; font-family: arial;text-align: center;text-transform: uppercase;width:20px;" href="javascript::void(0)">New T</a></li>
                    <?php } ?>
                    <li><a style="background: #0059ac; color: #fff; font-family: arial; text-align: center;text-transform: uppercase;width:20px;" href="javascript::void(0)">T</a></li>
                <?php } ?>
                <li><a style="background: #0059ac; color: #fff; font-family: arial; text-align: center;text-transform: uppercase;width:20px" href="<?php echo site_url('competition/result/'.$t_year.'/' . $com_id . '/' . $info['round_id'] . '/' . $class_id) ?>"><?php echo $info['round_id'] ?></a></li>
                <?php $i++;
            } ?>


            <div class="clear"></div>
            <?php
            $inc = 1;
            foreach ($description as $c) {
                ?>
                <li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?>><a style="width:25px; text-align: center" href="javascript::void(0)"><?php echo $inc ?></a></li>
                <!--<li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?>><a style="width:25px; text-align: center" href="javascript::void(0)"><?php echo $c['start'] ?></a></li>-->
                <li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?>><a style="width:70px; text-align: center" href="javascript::void(0)" title="<?php echo $c['competitor'] ?>"><?php  $ex=explode(' ',"$c[competitor]"); echo substr($ex[0], 0, 1) ?>.<?php echo $ex[1]?></a></li>   

                <?php $items = array();
                foreach ($count_info as $info) { ?>
                    <?php
                    $total1 = sql::row("competitor", "competitor='$c[competitor]' and class_id='$class_id' and competition_id='$com_id' and round_id='$info[round_id]'", "total");
                    $all_total+=$total1['total'];
                    if ($total1['total'] == '') {
                        $total1['total'] = 0;
                    }
                    $items[] = $total1['total'];
                    $total1['total'] = 0;
                }
                $minimum_value = min($items);
                //print_r($items);
//echo $minimum_value;
                ?>
                <? if ($d_status['drop_status'] == 2) { ?>
                      				
           <!--   <li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?>><a style="width:20px;text-align: center" href="javascript::void(0)"><?php echo $all_total - $minimum_value ?></a></li>-->
          <li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?>><a style="width:20px;text-align: center" href="javascript::void(0)"><?php echo $c['new_total'] ?></a></li>
                <?php } ?>
                <li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?>><a style="width:20px;text-align: center" href="javascript::void(0)"><?php echo $all_total; $all_total = 0; ?></a></li>
                <?php foreach ($count_info as $info) { ?>
                    <?php $total1 = sql::row("competitor", "competitor='$c[competitor]' and class_id='$class_id' and competition_id='$com_id' and round_id='$info[round_id]'", "total"); ?>
                    <li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?>>
                        <a style="width:20px;text-align: center" href="javascript::void(0)"><?php
            if ($total1['total'] != '') {
                echo $total1['total'];
            } else {
                echo 0;
            }
                    ?></a>
                    </li>

                <?php } ?>
                <div class="clear"></div>   
                <?php $inc++; ?>
            <?php } ?>
        </ul>
    <?php }
    ?>





            <!--            <li><a style="width:85px" href="javascript::void(0)"><?php echo $c['r1_score'] ?></a></li>
            <li><a style="width:85px" href="javascript::void(0)"><?php echo $c['r2_score'] ?></a></li>
            <li><a style="width:85px" href="javascript::void(0)"><?php echo $c['r3_score'] ?></a></li>
            <li><a style="width:85px" href="javascript::void(0)"><?php echo $c['r4_score'] ?></a></li>
            <li><a style="width:85px" href="javascript::void(0)"><?php echo $c['r5_score'] ?></a></li>
            <li><a style="width:85px" href="javascript::void(0)"><?php echo $c['r6_score'] ?></a></li>
            <li><a style="width:85px" href="javascript::void(0)"><?php echo $c['r7_score'] ?></a></li>
            <li><a style="width:85px" href="javascript::void(0)"><?php echo $c['total'] ?></a></li>-->





</div>
<div class="button_complete" style="width:150px;float:left;margin-top: 10px;"><a href="<?php echo site_url('competition/total_result/'.$t_year.'/'  . $com_id) ?>">Complete Result</a></div>
<div class="clear"></div>
<div class="class_nav_all" style="float:left;margin:0;margin-top:15px;padding:0;">
    <?php foreach ($com_all as $com) { ?>
        <a href="<?php echo site_url('competition/total_result/'.$t_year.'/' . $com_id . '/' . $com['class_id']) ?>"><?php echo $com['rider_class_name']; ?></a>
    <?php } ?>
</div>

