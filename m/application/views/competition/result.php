<script type="text/javascript" src="scripts/jquery-1.6.4.min.js"></script>
<div style="margin:10px 10px;">    
    <span style="text-align:left;float: right; margin-top: 10px;">
        <a class="next_previous_button" style="padding: 2px 10px" href="" onclick='window.history.back();'>< Back  </a>
    </span>
    <!--
    <form action="" method="post"><p><select class="select-style2" name="class_id"><?= common::get_class_options($_REQUEST['class_id']) ?></select></p>
<input type="submit" name="search" value="search"/>
</form>
    -->

    <div class="button_complete" style="width:150px;float:left; margin-top: 10px;"><a href="<?php echo site_url('competition/total_result/' . $r_year . '/' . $com_id) ?>">Complete Result</a></div>
    <div class="class_nav_all" style="float:left;margin:0;padding:0;margin-top: 10px;">
        <?php foreach ($com_all as $com) { ?>
            <?php $round_name = $this->session->userdata('round_name'); ?>

            <a href="<?php echo site_url('competition/result/' . $com['year'] . '/' . $com_id . '/' . $round_name . '/' . $com['class_id']) ?>"><?php echo $com['rider_class_name']; ?></a>
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

        echo '<div style="font-family: verdana;font-size: 16px; background: #041626;text-align:center; color:#fff;padding:5px 10px; margin: 0"">' . $c_name['rider_class_name'] . '</div>';

        $round_name = $this->session->userdata('round_name');
        $id = $this->session->userdata('id');

        $description = $this->mod_competition->get_all_competition_result($r_year, $id, $round_name, $class_id);


        $how_much_round = sql::row("competition_result", "1 and class_id=$class_id and competition_id=$id and round_id='$round_name' and year='$r_year'", "how_much_race");
        //$description = sql::rows('competitor', "class_id=$class_id and competition_id=$com_id  group by competitor order by t desc and year='$r_year", "sum(total) as t,competitor,start");

        $total_race_number = $how_much_round['how_much_race'];
        ?>


        <style>
            ul.first li{padding-left:0;padding-right:0;height:30px;}
            ul.first li a{font-size:11px;padding:5px 7px;}
        </style>

        <div class="clear"></div>            
        <!--    <div class="height1"></div>-->
        <div class="clear"></div>
        <ul class="first">
            <li style="height:20px;"><a style="background: #0059ac; color: #fff; font-family: arial; text-align: center;text-transform: uppercase;width:30px" href="javascript::void(0)">&nbsp;</a></li>
            <!--<li style="height:20px;"><a style="background: #0059ac; color: #fff; font-family: arial; text-align: center;text-transform: uppercase;width:30px" href="javascript::void(0)">Start</a></li>-->
            <li style="height:20px;"><a style="background: #0059ac; color: #fff; font-family: arial; text-align: center;text-transform: uppercase;width:80px" href="javascript::void(0)">Rider</a></li>
            <li style="height:20px;"><a style="background: #0059ac; color: #fff; font-family: arial; text-align: center;text-transform: uppercase;width:38px;" href="javascript::void(0)">T</a></li>
            <?php for ($i = 1; $i <= $total_race_number; $i++) { ?>
                <li style="height:20px;"><a style="background: #0059ac; color: #fff; font-family: arial;text-align: center;text-transform: uppercase;width:20px" href="javascript::void(0)">R<?= $i ?></a></li>


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
            foreach ($description as $c) {
                ?>

        <?php if ($c['position'] > 0) { ?>
                    <li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?>><a style="width:30px;text-align: center" href="javascript::void(0)"><?php echo $c['position'] ?></a></li>
                    <!--<li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?>><a style="width:30px;text-align: center" href="javascript::void(0)"><?php echo $c['start'] ?></a></li>-->
                    <li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?>><a style="width:80px;text-align: center" href="javascript::void(0)" title="<?php echo $c['competitor'] ?>"><?php  $ex=explode(' ',"$c[competitor]"); echo substr($ex[0], 0, 1) ?>.<?php echo $ex[1]?></a></li>
                    <li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?>><a style="width:38px;text-align: center" href="javascript::void(0)"><?php echo $c['total'] ?></a></li>




                    <?php if ($total_race_number >= 1) { ?>

                        <?php if ($c['r1_score'] > 0 && $c['r1_score'] != '') { ?>
                            <li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?>><a style="width:20px;text-align: center" href="javascript::void(0)"><?php echo $c['r1_score'] ?></a></li>
                        <?php } else { ?>
                            <li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?> class="else_print"><a style="width:20px;text-align: center" href="javascript::void(0)">&nbsp;</a></li>
                        <?php } ?>

                    <?php } ?>

                    <?php if ($total_race_number >= 2) { ?>

                        <?php if ($c['r2_score'] > 0 && $c['r2_score'] != '') { ?>
                            <li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?>><a style="width:20px;text-align: center" href="javascript::void(0)"><?php echo $c['r2_score'] ?></a></li>
                        <?php } else { ?>
                            <li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?> class="else_print"><a style="width:20px;text-align: center" href="javascript::void(0)">&nbsp;</a></li>
                        <?php } ?>

                    <?php } ?>

            <?php if ($total_race_number >= 3) { ?>


                        <?php if ($c['r3_score'] > 0 && $c['r3_score'] != '') { ?>
                            <li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?>><a style="width:20px;text-align: center" href="javascript::void(0)"><?php echo $c['r3_score'] ?></a></li>
                        <?php } else { ?>
                            <li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?> class="else_print"><a style="width:20px;text-align: center" href="javascript::void(0)">&nbsp;</a></li>
                        <?php } ?>

                    <?php } ?>

            <?php if ($total_race_number >= 4) { ?>



                        <?php if ($c['r4_score'] > 0 && $c['r4_score'] != '') { ?>
                            <li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?>><a style="width:20px;text-align: center" href="javascript::void(0)"><?php echo $c['r4_score'] ?></a></li>
                        <?php } else { ?>
                            <li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?> class="else_print"><a style="width:20px;text-align: center" href="javascript::void(0)">&nbsp;</a></li>
                        <?php } ?>

                    <?php } ?>

                    <?php if ($total_race_number >= 5) { ?>

                        <?php if ($c['r5_score'] > 0 && $c['r5_score'] != '') { ?>
                            <li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?>><a style="width:20px;text-align: center" href="javascript::void(0)"><?php echo $c['r5_score'] ?></a></li>
                        <?php } else { ?>
                            <li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?> class="else_print"><a style="width:20px;text-align: center" href="javascript::void(0)">&nbsp;</a></li>
                        <?php } ?>

                    <?php } ?>

                    <?php if ($total_race_number >= 6) { ?>

                        <?php if ($c['r6_score'] > 0 && $c['r6_score'] != '') { ?>
                            <li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?>> <a style="width:20px;text-align: center" href="javascript::void(0)"><?php echo $c['r6_score'] ?></a></li>
                        <?php } else { ?>
                            <li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?> class="else_print"><a style="width:20px;text-align: center" href="javascript::void(0)">&nbsp;</a></li>
                        <?php } ?>

                    <?php } ?>

                    <?php if ($total_race_number >= 7) { ?>

                        <?php if ($c['r7_score'] > 0 && $c['r7_score'] != '') { ?>
                            <li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?>><a style="width:20px;text-align: center" href="javascript::void(0)"><?php echo $c['r7_score'] ?></a></li>
                        <?php } else { ?>
                            <li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?> class="else_print"><a style="width:20px;text-align: center" href="javascript::void(0)">&nbsp;</a></li>
                        <?php } ?>

            <?php } ?>






                    <div class="clear"></div>

                <?php } ?>
                <?php $inc++;
            }
            ?>
        </ul> 


<?php } ?>

</div>
