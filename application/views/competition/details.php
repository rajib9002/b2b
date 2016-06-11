<script type="text/javascript" src="scripts/jquery-1.6.4.min.js"></script>


<div style="margin:10px 10px;">
    
<?php if(count($com_all)>0){?>
<div class="button_complete" style="width:150px;float:left; margin-top: 40px;"><a href="<?php echo site_url('competition/total_result/'.$description[0]['year'].'/'.$description[0]['competitionr_id']) ?>">Complete Result</a></div>
<?php }?>    
    




<div class="class_nav_all" style="width:800px;float:left;margin:0;padding:0;margin-top: 30px;">
    <?php foreach ($com_all as $com) { ?>
        <a href="<?php echo site_url('competition/total_result/'.$description[0]['year'].'/'. $description[0]['competitionr_id'] . '/' . $com['class_id']) ?>"><?php echo $com['rider_class_name']; ?></a>
    <?php } ?>
</div>

<div class="clear"></div> 
<br/>

    
    
    <p style="font-family: verdana;font-size: 20px; background: #041626; color:#fff;padding:10px 20px; margin: 0"><?php echo $description[0]['competitionr_name'] ?></p>
    <div class="clear"></div>            

    <div class="clear"></div>
    <ul class="first">
        <li><a style="background: #0059ac; color: #fff; font-family: arial; font-size: 15px;text-align: center;text-transform: uppercase; width: 205px;" href="javascript::void(0)">Round Name (Date)</a></li>
        <li><a style="background: #0059ac; color: #fff; font-family: arial; font-size: 15px;text-align: center;text-transform: uppercase; width: 300px;" href="javascript::void(0)">Venue</a></li>
        <li><a style="background: #0059ac; color: #fff; font-family: arial; font-size: 15px;text-align: center;text-transform: uppercase;width: 200px;" href="javascript::void(0)">Host Body</a></li>
        <li><a style="background: #0059ac; color: #fff; font-family: arial; font-size: 15px;text-align: center;text-transform: uppercase;width: 200px;" href="javascript::void(0)">Country</a></li>
        <li><a style="background: #0059ac; color: #fff; font-family: arial; font-size: 15px;text-align: center;text-transform: uppercase;width: 200px;" style="width:125px;" href="javascript::void(0)">Result</a></li>
        <div class="clear"></div>
        <div class="clear"></div>
        <?php $inc = 1;
        foreach ($description as $c) { //print_r($c); exit;  ?>

<?php $result = sql::row("competition_result", "competition_id=$c[competitionr_id] and year='$c[year]' and round_id='$c[competitionr_details_round]'"); ?>

<?php if (count($result) > 0) { ?>

            <li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?>><a class="fancybox fancybox.iframe" style="width: 204px;text-align: center" href="<?php echo site_url('competition/result/'.$c['year'].'/' . $c['competitionr_id'] . '/' . $c['competitionr_details_round']) ?>"><?php echo $c['competitionr_details_round'] . '&nbsp;(' . date('d/m/Y', strtotime($c[competitionr_details_date])) . ')' ?></a></li>


<?php } else { ?> 
            <li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?>><a  style="width: 204px;text-align: center" href="javascript:void(0);"><?php echo $c['competitionr_details_round'] . '&nbsp;(' . date('d/m/Y', strtotime($c[competitionr_details_date])) . ')' ?></a></li>    
 <?php } ?>


<?php if (count($result) > 0) { ?>

            <li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?>><a class="fancybox fancybox.iframe" style="width: 300px;text-align: center" href="<?php echo site_url('competition/result/'.$c['year'].'/' . $c['competitionr_id'] . '/' . $c['competitionr_details_round']) ?>"><?php echo $c['competitionr_details_host_club'] ?></a></li>


<?php } else { ?> 
               <li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?>><a  style="width: 300px;text-align: center" href="javascript:void(0);"><?php echo $c['competitionr_details_host_club'] ?></a></li> 
 <?php } ?>

            <li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?>><a href="javascript::void(0)" style="width: 200px;text-align: center"> <?php echo $c['competitionr_host_club'] ?></a></li>

            <li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?>><a href="javascript::void(0)" style="width: 200px;text-align: center"><?php echo $c['country_name'] ?></a></li>

            
            <?php if (count($result) > 0) { ?>
                <li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?>><a class="fancybox fancybox.iframe" style="width: 200px; text-align: center" href="<?php echo site_url('competition/result/'.$c['year'].'/' . $c['competitionr_id'] . '/' . $c['competitionr_details_round']) ?>">See Result</a></li>
            <?php } else { ?> 
                <li <?php if ($inc % 2 == 0) { ?> class="even_li" <?php } else { ?> class="odd_li"<?php } ?>><a style="width: 200px;text-align: center" href="javascript::void(0)">Not Published</a></li>
            <?php } ?>
            <div class="clear"></div>
            <?php $inc++;
        } ?>
    </ul>     

</div>

