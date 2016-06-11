<div class="step2_upper">
    <h2>Step 3 : Ad Type</h2>
</div>
<?php
if ($msg != '') {
    echo "<div class='error'>" . $msg . "</div>";
}
?>
<?php 
$all_parent_data = sql::rows('main_type','type_status =1');
?>
<form action='<?= $action ?>' method='post' class="form_content_bike2biker step2_form">
    <div class="content step_content">
        <?php $i = 1;
        foreach ($all_parent_data as $all) { ?>
        <div class="main_t_all">
            <div class="r_area">
                <input size="60" <?php if ($i == 1) { ?> checked='checked' <?php } ?> type="radio" name="parent_id" value="<?php echo $all['main_type_id'] ?>"/>
                    <?php echo $all['type_name'] ?>
            </div>
            <div class="clear"></div>
            <img class="main_t_img" src="<?php echo base_url() ?>uploads/bike_type_image/<?php echo $all['type_image'] ?>" width="140px" height="150px"/>
        </div>
            <?php
            $i++;
        } ?>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
    <span class="prev_step float_left">
        <input  class="next_previous_button"  onclick="history.back(-1)" value="< Previous Step"/>
    </span>
    <span class="next_step float_right">
        <input  class="next_previous_button" type="submit" name="save" value="Next Step >"/>
    </span>
    <div class="clear"></div>
</form>