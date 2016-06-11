<div class="content_m">
    <form action='<?= $action ?>' method='post'  class="form_content_bike2biker">
        <? $seller_email = $this->session->userdata('seller_email'); ?>
        <input class="select-style2" placeholder="Email" type="email" name="seller_email" size="30" value="<? echo (($session_array['seller_email']) ? $session_array['seller_email'] : $this->session->userdata('user_email'));  ?>"/>
        <?=form_error('seller_email', '<span>', '</span>') ?>
        <input class="select-style2" placeholder="Your Name" type="text" name="seller_name" size="30" value="<? echo (($session_array['seller_name']) ? $session_array['seller_name'] : $this->session->userdata('user_full_name'));  ?>"/>
        <?=form_error('seller_name', '<span>', '</span>') ?>
        
        
        <select name="seller_type">
            <option value="1" <?php if ($session_array[seller_type] == '1') echo 'selected';?>>
                Private
            </option>
            <option value="2" <?php if ($session_array[seller_type] == '2') echo 'selected';?>>
                Trade
            </option>
        </select>
        
        
        
        <input class="select-style2" placeholder="Your Mobile" type="text" name="seller_phone" size="30" value="<? echo (($session_array['seller_phone']) ? $session_array['seller_phone'] : $this->session->userdata('user_phone'));  ?>"/>
        <?=form_error('seller_phone', '<span>', '</span>') ?>
        <input class="select-style2" placeholder="Your Mobile 2" type="text" name="mobile_phone2" size="30" value="<?= $session_array['mobile_phone2'] ?>"/>
        <input class="select-style2" placeholder="Land Phone" type="text" name="land_phone" size="30" value="<?= $session_array['land_phone'] ?>"/>

        <div class="button_p_n">
            <input  class="previous_button" type="submit" onclick="history.back(-1)" value="Previous"/>
            <input  class="next_button" type="submit" name="save" value="Next"/>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </form>
</div>