<script type="text/javascript" src="scripts/jquery-1.6.4.min.js"></script>
<div style="margin:10px 10px;">
<p style="font-family: verdana;font-size: 25px;color:#08C;padding:20px 0;"><?php echo $description[0]['competitionr_name'] ?></p>
<div class="clear"></div>            
<div class="height1"></div>
            <div class="clear"></div>
            <ul class="first">
                <li><a href="javascript::void(0)">Round Name (Date)</a></li>
                <li><a href="javascript::void(0)">Venue</a></li>
                <li><a href="javascript::void(0)">Host Body</a></li>
                <li><a href="javascript::void(0)">Country</a></li>
                <li><a style="width:125px;" href="javascript::void(0)">Result</a></li>
                <div class="clear"></div>
                <div class="height2"></div>
                <div class="clear"></div>
                <?php foreach ($description as $c) { ?>
                    <li><a class="fancybox fancybox.iframe" href="<?php echo site_url('competition/result/' . $c['competitionr_id'] . '/' . $c['competitionr_details_round']) ?>"><?php echo $c['competitionr_details_round'].'&nbsp;('.date('d/m/Y', strtotime($c[competitionr_details_date])).')' ?></a></li>
                    <li><a class="fancybox fancybox.iframe" href="<?php echo site_url('competition/result/' . $c['competitionr_id'] . '/' . $c['competitionr_details_round']) ?>"><?php echo $c['competitionr_details_venue'] ?></a></li>
                    
                    <li><a href="javascript::void(0)"><?php echo $c['competitionr_host_club'] ?></a></li>
                    <li><a href="javascript::void(0)"><?php echo $c['country_name'] ?></a></li>
                    
                    <?php $result = sql::row("competition_result", "competition_id=$c[competitionr_id] and round_id='$c[competitionr_details_round]'"); ?>
                    <?php if (count($result) > 0) { ?>
                        <li><a style="width:125px;color:Green" class="fancybox fancybox.iframe" href="<?php echo site_url('competition/result/' . $c['competitionr_id'] . '/' . $c['competitionr_details_round']) ?>">See Result</a></li>
                    <?php } else { ?> 
                        <li><a style="width:125px;color:gray" href="javascript::void(0)">Not Published</a></li>
                    <?php } ?>
                        <div class="clear"></div>
                <?php } ?>
            </ul> 

           
            
            
            <div class="button_complete" style="width:200px;float:left;"><a href="<?php echo site_url('competition/total_result/'.$description[0]['competitionr_id'])?>">Complete Result</a></div>
<div class="class_nav_all" style="width:900px;float:left;margin:0;padding:0;">
    <?php foreach($com_all as $com){?>
    <a href="<?php echo site_url('competition/total_result/'.$description[0]['competitionr_id'].'/'.$com['class_id'])?>"><?php echo $com['rider_class_name'];?></a>
<?php }?>
</div>
            <div class="clear"></div>
        </div>

