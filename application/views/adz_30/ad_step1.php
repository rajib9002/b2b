<script>
    $(document).ready(function() {
        var text_max = 20;
        $('#textarea_feedback').html(text_max + ' characters remaining');
        $('#textarea').keyup(function() {
            var text_length = $('#textarea').val().length;
            var text_remaining = text_max - text_length;
            $('#textarea_feedback').html(text_remaining + ' characters remaining');
        });
    });
</script>
<div class="step2_upper">
    <h2>Step 2 : Type of Ad</h2>
    <h3>Your advertisement stays online until you sell it &nbsp;<span style="font-size: 16px; color: blue">FREE</span> </h3>
</div>
<form action='<?= $action ?>' method='post'  class="form_content_bike2biker" >
    <div class="content step_content">
        <div  class="step2_left">

<!--            <p style="font-size: 18px; margin: 0; padding: 5px;">Select Main Type</p>-->
        <p>
             <select name="main_type_id" class="select-style2 gender2">
            <?= common::get_bike_main_type($_REQUEST['main_type_id']) ?>
        </select>
        </p>

        <?= form_error('main_type_id', '<span style="color:red;">', '</span>') ?>
        <div class="clear"></div>



            <p style="font-size: 18px; margin: 0; padding: 5px;"> Ad type</p>

            <p><input type="radio" name="ad_type" value="1" checked="checked"/> For Sale( You have something to sell)</p>

            <p><input type="radio" name="ad_type" value="2" /> Wanted( You are looking for something to buy)</p>
            <?= form_error('ad_type', '<span>', '</span>') ?>

            <br/>
            <br/>
            <p style="color:white ; font-size: 18px; margin: 0; padding: 5px;">Type of seller</p>
            <p><input type="radio" name="seller_type" value="1" checked="checked"/>Private</p>
            <p> <input type="radio" name="seller_type" value="2" />Trade</p>
        </div>

        <div class="step2_right" style="width: 350px; float: left; margin-left: 50px">
            <span style="color:#fff; font-size: 18px; text-align: left;"> Brief Description* </span>
            <textarea name="ad_title" rows="1" cols="50" style="padding: 10px" id="textarea" maxlength="20" value="<?= set_value('ad_title', $ad_title) ?>"></textarea>
            <?= form_error('ad_title', '<span style="display:block;color:red;">', '</span>') ?>
        </div>
        <div style="width: 350px; float: left; color: #fff; margin: 10px 0 0 -60px; " id="textarea_feedback"></div>


        <div class="clear"></div>
    </div>


    <div class="clear"></div>
    <span class="prev_step">
        <input  class="next_previous_button" type="submit" onclick="history.back(-1)" value="< Previous Step"/>

    </span>
    <span  class="next_step">
        <input  class="next_previous_button" type="submit" name="save" value="Next Step >"/>
    </span>

</form>













