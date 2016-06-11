<div class="container">

    <div class="box" style="padding:0 30px; width: 160px">
        <div class="title">
            Site Logo 
        </div>
        <div class="clear"></div>
        <img style="margin-top:20px;" src="img/logo_bottom.png" width="100%">

    </div>


    <div class="box" style="padding:0 30px; width: 320px"> 
        <div class="title">
            Navigation 
        </div>
        <div class="clear"></div>
        <ul class="foot_nav">            
            <li><a href="<?= site_url('adz/adz_list'); ?>" <?php if ($page == 'index' && $dir == 'adz' && $ad_type == 'all') { ?> class="currentLinkFooter" <? } ?>>Home</a></li>
            <li><a href="<?= site_url('adz/all_advertise'); ?>" <?php if ($page == 'all_advertise' && $dir == 'adz') { ?> class="currentLinkFooter" <? } ?>>All Ads</a></li>
            <li><a href="<?= site_url('adz/adz_list/1'); ?>" <?php if ($page == 'index' && $dir == 'adz' && $ad_type == '1') { ?> class="currentLinkFooter" <? } ?>>Sale Ads</a></li>
            <li><a href="<?= site_url('adz/adz_list/2'); ?> " <?php if ($page == 'index' && $dir == 'adz' && $ad_type == '2') { ?> class="currentLinkFooter" <? } ?>>Wanted Ads</a></li>
            <li><a href="<?= site_url('competition'); ?>" <?php if ($page == 'index' && $dir == 'competition') { ?> class="currentLinkFooter" <? } ?>>Competition&nbsp;&nbsp;</a></li>
            <li><a href="<?= site_url('contact'); ?>" <?php if ($page == 'contact_form' && $dir == 'contact') { ?> class="currentLinkFooter" <? } ?>>&nbsp;&nbsp;Contact us &nbsp;&nbsp;</a></li>
            <?php if (!common::is_logged_in()) { ?>  <li><a href="<?= site_url('signup'); ?>" <?php if ($page == 'index' && $dir == 'signup') { ?> class="currentLinkFooter" <? } ?>>&nbsp;&nbsp;&nbsp;&nbsp;Sign up</a></li>
                <li><a href="<?php echo site_url('login') ?>" <?php if ($page == 'index' && $dir == 'login') { ?> class="currentLinkFooter" <? } ?>> LOG IN</a></li> <?php }
        if (common::is_logged_in()) { ?>
<!--                <li><a href="<?php echo site_url('adz/my_ads') ?>"><?= $this->session->userdata('user_name') ?> </a></li> -->
                <li> <a href="<?php echo site_url('login/logout') ?>" >LOG OUT</a> </li><?php }
            ?>
        </ul>

    </div>

    <div class="box" style="border-right:0;padding:0 30px; width: 160px">
        <div class="title">
            Follow us
        </div>
        <div class="clear"></div>
        <div class="shared_icon_bottom">
            <?php $link_data = common::get_settings_data(); ?>
            <a href="<?= $link_data['faecbook_link']; ?>" target="_blank"><img src="img/f.png" width="30px;" height="30px;"></a> 
            <a href="<?= $link_data['twitter_link']; ?>" target="_blank"><img src="img/t.png" width="30px;" height="30px;"></a>
            <a href="<?= $link_data['youtube_link']; ?>" target="_blank"><img src="img/y.png" width="30px;" height="30px;"></a>
            <a href="mailto:info@bike2biker.com" target="_blank"><img src="img/e.png" width="30px;" height="30px;"></a>
            <a href="<?= $link_data['googleplus_link']; ?>" target="_blank"><img src="img/g.png" width="30px;" height="30px;"></a>
        </div>

    </div>


</div>
