<?php $lg = common::get_settings_data(); ?>
<div class="header_new">
    <div class="header_new_left float_left"><a href="<?= site_url('adz/adz_list'); ?>"><img src="<?= base_url() ?>/uploads/welcome_right/<?php echo $lg['logo'] ?>"width="150px" height="25px"/></a></div>
    <div class="header_new_right float_right">
        <div class="shared_icon">
            <div class="clear"></div>

            <?php if (common::is_logged_in()) { ?> <a href="<?php echo site_url('login/logout') ?>" style="height:18px; width:60px"><img src="img/logout.png" style="height:12px; width:40px"></a> <a href="<?php echo site_url('adz/my_ads') ?>" style="height:18px; margin-top: 1px; color: #092c0d;float: right; font-size: 11px; font-weight: bold">welcome <?= $this->session->userdata('user_full_name'); ?></a> <?php }

        if (!common::is_logged_in()) { ?>  <a href="<?php echo site_url('signup') ?>" style="height:18px; width:60px"><img src="img/signup.png" style="height:12px; width:50px"></a> <a href="<?php echo site_url('login') ?>" style="height:18px; width:60px"><img src="img/login.png" style="height:12px; width:40px"></a> <?php }
            ?>
        </div>
        <div class="clear"></div>

        <ul  class="header_menu" style="margin-top: 4px">           
            <li><a title="Contact Us" href="<?php echo site_url('contact') ?>" <?php if ($page == 'contact_form' && $dir == 'contact') { ?> class="currentLink" <? } ?>>Contact Us</a></li>
            <?php if (common :: is_logged_in()) { ?> <li><a title="My Ads" href="<?php echo site_url('adz/my_ads') ?>"  <?php if ($page == 'my_ads' && $dir == 'adz') { ?> class="currentLink" <? } ?>>MY ADS</a></li> <?php } ?>
            <li><a title="Competition" href="<?= site_url('competition'); ?>" <?php if ($page == 'index' && $dir == 'competition') { ?> class="currentLink" <? } ?>>Competition</a></li>
            <?php if (common:: is_logged_in()): ?>
                <?php
            else:
                ?>

            <?php
            endif;
            ?>
            <li><a title="Wanted Ads" href="<?= site_url('adz/adz_list/2'); ?>" <?php if ($page == 'index' && $dir == 'adz' && $ad_type == '2') { ?> class="currentLink" <? } ?>>Wanted Ads</a></li>
            <li><a title="Sale Ads" href="<?= site_url('adz/adz_list/1'); ?>" <?php if ($page == 'index' && $dir == 'adz' && $ad_type == '1') { ?> class="currentLink" <? } ?>>Sale Ads</a></li>
            <li><a title="All Ads" href="<?= site_url('adz/all_advertise'); ?>" <?php if ($page == 'all_advertise' && $dir == 'adz') { ?> class="currentLink" <? } ?>>All Ads</a></li>
            <li><a title="Home" href="<?= site_url('adz/adz_list'); ?>" <?php if ($page == 'index' && $dir == 'adz' && $ad_type == 'all') { ?> class="currentLink" <? } ?> >Home</a></li>


            <div class="clear"></div>
        </ul>
        <div class="clear"></div>

    </div>
</div>
