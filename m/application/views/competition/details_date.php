<script type="text/javascript" src="scripts/jquery-1.6.4.min.js"></script>


<div style="margin:10px 10px;">

   
    <div class="clear"></div> 
    <br/>



    <p style="font-family: verdana;
    font-size: 16px;
    background: #041626;
    color: #fff;
    padding: 5px 20px;
    margin: 0;
    width: 271px;
    margin-left: 1px;
    text-align: center;"><?php echo $description[0]['competitionr_name'] ?></p>
    <div class="clear"></div>            

    <div class="clear"></div>
    <ul class="first" style="border-right: 1px solid #d0d0d0;">
        <li><a style="background: #0059ac; color: #fff; font-family: arial; font-size: 15px;text-align: center;text-transform: uppercase; width: 70px;" href="javascript::void(0)">Date</a></li>
        <li><a style="background: #0059ac; color: #fff; font-family: arial; font-size: 15px;text-align: center;text-transform: uppercase; width: 137px;" href="javascript::void(0)">Venue</a></li>
        <li><a style="background: #0059ac; color: #fff; font-family: arial; font-size: 15px;text-align: center;text-transform: uppercase;width: 60px;" style="width:125px;" href="javascript::void(0)">Result</a></li>
        <div class="clear"></div>
        <?php
        $inc = 1;
        foreach ($description as $c) { //print_r($c); exit;  
            ?>
            <?php $result = sql::row("competition_result", "competition_id=$c[competitionr_id] and year='$c[year]' and round_id='$c[competitionr_details_round]'"); ?>
            <?php if (count($result) > 0) { ?>
                <li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?>><a class="fancybox fancybox.iframe" style="width: 70px;text-align: center;height:20px;" href="<?php echo site_url('competition/result/' . $c['year'] . '/' . $c['competitionr_id'] . '/' . $c['competitionr_details_round']) ?>"><?php echo date('d/m/Y', strtotime($c[competitionr_details_date]))?></a></li>
            <?php } else { ?> 
                <li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?>><a  style="width: 70px;text-align: center;height:20px;" href="javascript:void(0);"><?php echo  date('d/m/Y', strtotime($c[competitionr_details_date]))?></a></li>    
            <?php } ?>


<?php 
$c_short_name=sql::row("club","club_name='$c[competitionr_details_host_club]'","club_short_name");
$c['competitionr_details_host_club']=$c_short_name[club_short_name];
?>

            <?php if (count($result) > 0) { ?>
                <li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?>><a class="fancybox fancybox.iframe" style="width: 137px;text-align: center;height:20px;" href="<?php echo site_url('competition/result/' . $c['year'] . '/' . $c['competitionr_id'] . '/' . $c['competitionr_details_round']) ?>"><?php echo $c['competitionr_details_host_club'] ?></a></li>
            <?php } else { ?> 
                <li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?>><a  style="width: 137px;text-align: center;height:20px;" href="javascript:void(0);"><?php echo $c['competitionr_details_host_club'] ?></a></li> 
            <?php } ?>
            <?php if (count($result) > 0) { ?>
                <li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?>><a class="fancybox fancybox.iframe" style="width: 60px; text-align: center;height:20px;" href="<?php echo site_url('competition/result/' . $c['year'] . '/' . $c['competitionr_id'] . '/' . $c['competitionr_details_round']) ?>">Result</a></li>
            <?php } else { ?> 
                <li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?>><a style="width: 60px;text-align: center;height:20px;" href="javascript::void(0)">&nbsp;</a></li>
            <?php } ?>
            <div class="clear"></div>
            <?php
            $inc++;
        }
        ?>
    </ul>     

</div>