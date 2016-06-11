
<div class="step2_upper">
    <h2>Step 3 : Ad Type</h2>
</div>

<?php
 print_r($session_array);
if ($msg != '') {
    echo "<div class='success' style='color:red;padding:10px;font-size: 14px;text-align:left;'>" . $msg . "</div>";
}
?>

<?php $all_parent_data = sql::rows('main_type', 'type_status =1'); ?>


<div class="content" style="background-color:#376388;padding:20px;width:280px;border-radius: 5px;margin:20px auto;">
<form action='<?= site_url($action) ?>' method='post'  class="form_content_bike2biker" style="height:205px">
        <?php $i = 1;
        foreach ($all_parent_data as $all) { ?>
            <div style="width:85px;float:left;padding:5px 1px; margin:1px;">
                <div style="color:#fff; font-size: 10px; text-align: left; margin-left: 5px;"><input size="30" <?php if ($i == 1) { ?> checked='checked' <?php } ?> type="radio" name="parent_id" value="<?php echo $all['main_type_id'] ?>"/>
                    <?php echo $all['type_name'] ?>
                </div>

                <img style="border:4px solid #eee;margin-top:5px;" src="<?php echo UPLOAD_PATH ?>/bike_type_image/<?php echo $all['type_image'] ?>" width="60px" height="60px"/>
            </div>

            <?php $i++;
        } ?>
   
    <span style="text-align:left; margin: 70px 0 20px -20px">  
        <a class="next_previous_button" href="" onclick='window.history.back();'>
            < Previous Step
        </a>
    </span>
    <span  style="float:right; margin:  70px -20px 20px 0px">         
        <input  class="next_previous_button" type="submit" name="save" value="Next Step >"/>
    </span>
    <div class="clear"></div> 

</form>

</div>