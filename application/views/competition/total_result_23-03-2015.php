<script type="text/javascript" src="scripts/jquery-1.6.4.min.js"></script>
<div style="margin:10px 10px;">
    <input type="button" class="button" name="cancel" value="Previous Page" onclick='window.history.back();'/>
    <p style="font-family: verdana;font-size: 25px;color:#08C;padding:20px 0;"><?php echo $competitionr_name ?></p>
    <div class="clear"></div> 
    <!--<form action="" method="post"><p><select class="select-style2" name="class_id"><?= common::get_class_options($_REQUEST['class_id']) ?></select></p>
        <input type="submit" name="search" value="search"/>
    </form>

    <div class="clear"></div> -->
	
	
	    <div class="button_complete" style="width:200px;float:left;"><a href="<?php echo site_url('competition/total_result/'.$com_id)?>">Complete Result</a></div>
<div class="class_nav_all" style="width:900px;float:left;margin:0;padding:0;">
    <?php foreach($com_all as $com){?>
    <a href="<?php echo site_url('competition/total_result/'.$com_id.'/'.$com['class_id'])?>"><?php echo $com['rider_class_name'];?></a>
<?php }?>
</div>
            <div class="clear"></div>
	
	
    <br/>



    <?php foreach ($total_class as $total_class) { ?>
        <div class="height1"></div>

        <div class="clear"></div>
        <?php
        $class_id = $total_class['class_id'];
        $c_name = sql::row("rider_class", "rider_class_id=$class_id", "rider_class_name");

        echo '<div style="padding:5px 0;font-size:25px;"><b>Class Name: &nbsp;</b>' . $c_name['rider_class_name'] . '</div>';

        $d_status_new=sql::row("competition_result","competition_id =$com_id AND class_id =$class_id GROUP BY class_id","drop_status");
        
        if($d_status_new['drop_status']==2){
            $sort='new_total';
        }else{
            $sort='t';
        }
        
        $description = sql::rows('competitor', "class_id=$class_id and competition_id=$com_id  group by competitor order by $sort desc", "sum(total) as t,competitor,start,new_total");
        ?>

        <div class="height2"></div>
        <div class="clear"></div>

        <ul class="first">
            <li><a style="width:50px" href="javascript::void(0)">Pos</a></li>
            <li><a style="width:50px" href="javascript::void(0)">Start</a></li>
            <li><a style="width:158px" href="javascript::void(0)">Rider Name</a></li>
			
	<?php
            $d_status = sql::row('competition_result', "class_id=$class_id and competition_id=$com_id", "drop_status");
        ?>
            
            <?php $i=1; foreach ($count_info as $info) { ?>
                <!--<li><a style="width:55px" href="javascript::void(0)"><?php echo $info['round_id'] ?></a></li>-->
				<?php if($i==1){?>
				<?if($d_status['drop_status']==2){?>
				<li><a style="width:85px;" href="javascript::void(0)">New Total</a></li>
				<?php }?>
				<li><a style="width:85px;" href="javascript::void(0)">Total</a></li>
				<?php }?>
				<li><a style="width:55px" href="<?php echo site_url('competition/result/'.$com_id.'/'.$info['round_id'].'/'.$class_id)?>"><?php echo $info['round_id'] ?></a></li>
            <?php $i++; } ?>

            <div class="clear"></div>
            <div class="height2"></div>
            <div class="clear"></div>
            <?php
            $inc = 1;
            foreach ($description as $c) {
                ?>
                <li><a style="width:50px" href="javascript::void(0)"><?php echo $inc ?></a></li>
                <li><a style="width:50px" href="javascript::void(0)"><?php echo $c['start'] ?></a></li>
                <li><a style="width:158px" href="javascript::void(0)" title="<?php echo $c['competitor'] ?>"><?php echo substr($c['competitor'], 0, 15) ?></a></li>   

                <?php $items = array(); foreach ($count_info as $info) { ?>
                    <?php
                    $total1 = sql::row("competitor", "competitor='$c[competitor]' and class_id='$class_id' and competition_id='$com_id' and round_id='$info[round_id]'", "total");
                    $all_total+=$total1['total'];
                    if($total1['total']==''){
                        $total1['total']=0;
                    }
		    $items[] = $total1['total'];
                    $total1['total'] = 0;
                }
                
                
                
				$minimum_value= min($items);
				//print_r($items);

//echo $minimum_value;
                ?>
				<?if($d_status['drop_status']==2){?>
<!--				<li><a style="width:85px;" href="javascript::void(0)"><?php echo $all_total-$minimum_value?></a></li>-->
<li><a style="width:85px;" href="javascript::void(0)"><?php echo $c['new_total']?></a></li>				
<?php }?>
                <li><a style="width:85px" href="javascript::void(0)"><?php echo $all_total;
                $all_total = 0; ?></a></li>
                        <?php foreach ($count_info as $info) { ?>
                            <?php $total1 = sql::row("competitor", "competitor='$c[competitor]' and class_id='$class_id' and competition_id='$com_id' and round_id='$info[round_id]'", "total"); ?>
                    <li>
                        <a style="width:55px" href="javascript::void(0)"><?php
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
    <?php
}
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

