<div class="content_m">
    <?php
    if ($msg != '') {
        echo "<div class='success'>" . $msg . "</div>";
    }
    ?>
    <form id="form" action='<?= site_url($action); ?>' method='post'>
        <input type="text" name='user_name' value='<?= set_value('user_name', $user_name) ?>' placeholder="User Name*"/>
        <?= form_error('user_name', '<span style="display:block;color:red;">', '</span>') ?>
        <input type="text" name='user_first_name' value='<?= set_value('user_first_name', $user_first_name) ?>' placeholder="First Name*"/>
        <?= form_error('user_first_name', '<span style="display:block;color:red;">', '</span>') ?>
        <input type="text" name='user_last_name' value='<?= set_value('user_last_name', $user_last_name) ?>' placeholder="Last Name"/>
        <?= form_error('user_last_name', '<span style="display:block;color:red;">', '</span>') ?>
        <input type='password' name='user_password' id="user_password" value='<?= set_value('user_password', $user_password) ?>' placeholder="Password*"/>
        <?= form_error('user_password', '<span style="display:block;color:red;">', '</span>') ?>
        <input  type='password' name='confirm_password' value='<?= set_value('confirm_password', $user_password) ?>' placeholder="Confirm Password*"/>
        <?= form_error('confirm_password', '<span style="display:block;color:red;">', '</span>') ?>
        <input type="text" name='user_email' value='<?= set_value('user_email', $user_email) ?>' placeholder="Email*"/>
        <?= form_error('user_email', '<span style="display:block;color:red;">', '</span>') ?>
        <input type="text" name='user_phone' value='<?= set_value('user_phone', $user_phone) ?>' placeholder="Phone*"/>
        <?= form_error('user_phone', '<span style="display:block;color:red;">', '</span>') ?>
        
        
        <input class="select-style2" placeholder="Your Mobile 2" type="text" name="mobile_phone2" size="30" value="<?= $_REQUEST['mobile_phone2'] ?>"/>
            <input class="select-style2" placeholder="Land Phone" type="text" name="land_phone" size="30" value="<?= $_REQUEST['land_phone'] ?>"/>
        
        
        <select class="select-style2 gender2 jcountry jload_area2" name="country_id"><?= common::get_country_options($_REQUEST['country_id']) ?></select>
        <div class="clear"></div>
        <span> <?= form_error('country_id', '<span style="display:block;color:red;">', '</span>') ?>
            <select class="select-style2 gender2 jarea" id="j_area_data2" name="area_id"><?= common::get_area($_REQUEST['area_id']) ?></select>
            <div class="clear"></div>
            <?= form_error('area_id', '<span style="display:block;color:red;">', '</span>') ?>



            <input type="text" name='post_code' value='<?= set_value('post_code', $post_code) ?>' placeholder="Post Code*"/>
            <?= form_error('post_code', '<span style="display:block;color:red;">', '</span>') ?>

            <select name="currency"  class="select-style2" style="">
                <option value="Euro" <?php if ($session_array[currency] == 'Euro') { ?> selected="selected" <?php } ?>>Euro €</option>
                <option value="GBP" <?php if ($session_array[currency] == 'GBP') { ?> selected="selected" <?php } ?>>GBP £</option>
            </select>

            <select name="seller_type">
                <option value="1" <?php if ($_REQUEST[seller_type] == '1') echo 'selected'; ?>>
                    Private
                </option>
                <option value="2" <?php if ($_REQUEST[seller_type] == '2') echo 'selected'; ?>>
                    Trade
                </option>
            </select>


            


            <input type="hidden" name="sess_value" value="<?= $user_id ?>" /> 
            <div class="button_p_n">
                <input  class="previous_button" type="submit" onclick="history.back(-1)" value="Previous"/>
                <input  class="next_button"  type='submit' name='save' value='Sign Up'/>
                <div class="clear"></div>
            </div>
    </form>
</div>