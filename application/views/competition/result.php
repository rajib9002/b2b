<script type="text/javascript" src="scripts/jquery-1.6.4.min.js"></script>
<div style="margin:10px 10px;">    
    <span style="text-align:left;float: right; margin-top: 40px;">
        <a class="next_previous_button" style="padding: 10px 30px" href="" onclick='window.history.back();'>< Back  </a>
    </span>
    <!--
    <form action="" method="post"><p><select class="select-style2" name="class_id"><?= common::get_class_options($_REQUEST['class_id']) ?></select></p>
<input type="submit" name="search" value="search"/>
</form>
    -->

    <div class="button_complete" style="width:150px;float:left; margin-top: 40px;"><a href="<?php echo site_url('competition/total_result/'.$r_year.'/'. $com_id) ?>">Complete Result</a></div>
    <div class="class_nav_all" style="width:800px;float:left;margin:0;padding:0;margin-top: 30px;">
        <?php foreach ($com_all as $com) { ?>
            <?php $round_name = $this->session->userdata('round_name'); ?>

            <a href="<?php echo site_url('competition/result/'.$com['year'].'/' . $com_id . '/' . $round_name . '/' . $com['class_id']) ?>"><?php echo $com['rider_class_name']; ?></a>
        <?php } ?>
    </div>

    <div class="clear"></div> 
    <br/>



    <?php foreach ($total_class as $total_class) { ?>
        <!--        <div class="height1"></div>-->

        <div class="clear"></div>
        <?php
        $class_id = $total_class['class_id'];
        $c_name = sql::row("rider_class", "rider_class_id=$class_id", "rider_class_name");

        echo '<div style="font-family: verdana;font-size: 18px; background: #041626; color:#fff;padding:8px 20px; margin: 0"">' . $c_name['rider_class_name'] . '</div>';

        $round_name = $this->session->userdata('round_name');
        $id = $this->session->userdata('id');

        $description = $this->mod_competition->get_all_competition_result($r_year,$id, $round_name, $class_id);


        $how_much_round = sql::row("competition_result", "1 and class_id=$class_id and competition_id=$id and round_id='$round_name' and year='$r_year'", "how_much_race");
        //$description = sql::rows('competitor', "class_id=$class_id and competition_id=$com_id  group by competitor order by t desc and year='$r_year", "sum(total) as t,competitor,start");

        $total_race_number = $how_much_round['how_much_race'];
        ?>




        <div class="clear"></div>            
        <!--    <div class="height1"></div>-->
        <div class="clear"></div>
        <ul class="first">
            <li><a style="background: #0059ac; color: #fff; font-family: arial; font-size: 14px;text-align: center;text-transform: uppercase;width:80px" href="javascript::void(0)">Position</a></li>
            <li><a style="background: #0059ac; color: #fff; font-family: arial; font-size: 14px;text-align: center;text-transform: uppercase;width:80px" href="javascript::void(0)">Start No</a></li>
            <li><a style="background: #0059ac; color: #fff; font-family: arial; font-size: 14px;text-align: center;text-transform: uppercase;width:158px" href="javascript::void(0)">Rider Name</a></li>
            <li><a style="background: #0059ac; color: #fff; font-family: arial; font-size: 14px;text-align: center;text-transform: uppercase;width:85px;" href="javascript::void(0)">Total</a></li>
            <?php for ($i = 1; $i <= $total_race_number; $i++) { ?>
                <li><a style="background: #0059ac; color: #fff; font-family: arial; font-size: 14px;text-align: center;text-transform: uppercase;width:85px" href="javascript::void(0)">Race<?= $i ?></a></li>


            <?php } ?>
            <!--        <li><a style="width:85px" href="javascript::void(0)">Race2</a></li>
                    <li><a style="width:85px" href="javascript::void(0)">Race3</a></li>
                    <li><a style="width:85px" href="javascript::void(0)">Race4</a></li>
                    <li><a style="width:85px" href="javascript::void(0)">Race5</a></li>
                    <li><a style="width:85px" href="javascript::void(0)">Race6</a></li>
                    <li><a style="width:85px" href="javascript::void(0)">Race7</a></li>-->

            <div class="clear"></div>
            <!--        <div class="height2"></div>-->
            <div class="clear"></div>
            <?php $inc++;
            foreach ($description as $c) { ?>

        <?php if ($c['position'] > 0) { ?>
                    <li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?>><a style="width:80px;text-align: center" href="javascript::void(0)"><?php echo $c['position'] ?></a></li>
                    <li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?>><a style="width:80px;text-align: center" href="javascript::void(0)"><?php echo $c['start'] ?></a></li>
                    <li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?>><a style="width:158px;text-align: center" href="javascript::void(0)" title="<?php echo $c['competitor'] ?>"><?php echo substr($c['competitor'], 0, 15) ?></a></li>
                    <li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?>><a style="width:85px;text-align: center" href="javascript::void(0)"><?php echo $c['total'] ?></a></li>






                    <?php if ($c['r1_score'] > 0) { ?>
                        <li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?>><a style="width:85px;text-align: center" href="javascript::void(0)"><?php echo $c['r1_score'] ?></a></li>
                    <?php } else { ?>
                        <li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?> class="else_print"><a style="width:85px;text-align: center" href="javascript::void(0)">&nbsp;</a></li>
            <?php } ?>




                    <?php if ($c['r2_score'] > 0) { ?>
                        <li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?>><a style="width:85px;text-align: center" href="javascript::void(0)"><?php echo $c['r2_score'] ?></a></li>
                    <?php } else { ?>
                        <li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?> class="else_print"><a style="width:85px;text-align: center" href="javascript::void(0)">&nbsp;</a></li>
            <?php } ?>




                    <?php if ($c['r3_score'] > 0) { ?>
                        <li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?>><a style="width:85px;text-align: center" href="javascript::void(0)"><?php echo $c['r3_score'] ?></a></li>
                    <?php } else { ?>
                        <li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?> class="else_print"><a style="width:85px;text-align: center" href="javascript::void(0)">&nbsp;</a></li>
            <?php } ?>





                    <?php if ($c['r4_score'] > 0) { ?>
                        <li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?>><a style="width:85px;text-align: center" href="javascript::void(0)"><?php echo $c['r4_score'] ?></a></li>
                    <?php } else { ?>
                        <li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?> class="else_print"><a style="width:85px;text-align: center" href="javascript::void(0)">&nbsp;</a></li>
            <?php } ?>



                    <?php if ($c['r5_score'] > 0) { ?>
                        <li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?>><a style="width:85px;text-align: center" href="javascript::void(0)"><?php echo $c['r5_score'] ?></a></li>
                    <?php } else { ?>
                        <li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?> class="else_print"><a style="width:85px;text-align: center" href="javascript::void(0)">&nbsp;</a></li>
            <?php } ?>



                    <?php if ($c['r6_score'] > 0) { ?>
                        <li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?>> <a style="width:85px;text-align: center" href="javascript::void(0)"><?php echo $c['r6_score'] ?></a></li>
                    <?php } else { ?>
                        <li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?> class="else_print"><a style="width:85px;text-align: center" href="javascript::void(0)">&nbsp;</a></li>
            <?php } ?>



                    <?php if ($c['r7_score'] > 0) { ?>
                        <li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?>><a style="width:85px;text-align: center" href="javascript::void(0)"><?php echo $c['r7_score'] ?></a></li>
                    <?php } else { ?>
                        <li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?> class="else_print"><a style="width:85px;text-align: center" href="javascript::void(0)">&nbsp;</a></li>
            <?php } ?>







                    <div class="clear"></div>

                <?php } ?>
        <?php $inc++;
    } ?>
        </ul> 


<?php } ?>

</div>

