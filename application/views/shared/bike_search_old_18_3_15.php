<?php
$country_id = $this->session->userdata('country_id');
$area_id = $this->session->userdata('area_id');
$t_id = $this->session->userdata('t_id');
$make_id = $this->session->userdata('company_id');
$model_id = $this->session->userdata('model_id');
$order = $this->session->userdata('order_by');
?>
<?php $lg = common::get_settings_data(); ?>
<div class="header_new">
    <div class="header_new_left float_left"><a href="<?= site_url('adz'); ?>"><img src="<?= base_url() ?>/uploads/welcome_right/<?php echo $lg['logo'] ?>"width="482px" height="94px"/></a></div>
    <div class="header_new_right float_right">
        <div class="shared_icon">
            <a href=""><img src="img/g.png"></a>
            <a href=""><img src="img/e.png"></a>
            <a href=""><img src="img/y.png"></a>
            <a href=""><img src="img/t.png"></a>
            <a href=""><img src="img/f.png"></a>
            <div class="clear"></div>
            <a href="<?php echo site_url('login') ?>"><img src="img/login.png"></a>
            <a href="<?php echo site_url('signup') ?>"><img src="img/signup.png"></a>
        </div>
        <div class="clear"></div>

        <ul id="header_menu" class="header_menu">
            <li><a title="Blog" href="<?php echo site_url('pages/schedule') ?>">Test</a></li>
            <li><a title="Contact Us" href="<?php echo site_url('contact') ?>">Contact Us</a></li>
            <li><a title="Competition" href="<?= site_url('competition'); ?>">Competition</a></li>
            <?php if (common:: is_logged_in()): ?>
                <?php
            else:
                ?>
                                <!--<li><a href="<?= site_url('login'); ?>" title="Login">Login</a></li>-->	
            <?php
            endif;
            ?>
<!--            <li><a title="Advanced Search" href="<?= site_url('adz/advanced_search'); ?>">Advanced Search</a></li>
            <li><a title="Signup" href="<?= site_url('signup'); ?>">Signup</a></li>-->
            <li><a title="Wanted Ads" href="<?= site_url('adz/index/2'); ?>">Wanted Ads</a></li>
            <li><a title="Sale Ads" href="<?= site_url('adz/index/1'); ?>">Sale Ads</a></li>
            <li><a title="All Ads" href="<?= site_url('adz/all_advertise'); ?>">All Ads</a></li>
            <li><a title="Home" href="<?= site_url('adz'); ?>">Home</a></li>


            <div class="clear"></div>
        </ul>
        <div class="clear"></div>
        <?php if (common:: is_logged_in()): ?>
            <!--            <ul id="header_menu" class="header_menu">
                            <li><a href="<?= site_url('adz/my_ads'); ?>" title="My ads">My Ads</a></li>
                            <li><a title="logout" href="<?= site_url('login/logout'); ?>">Logout</a></li>
                            <li><a title="Change Password" href="<?= site_url('account/account_password'); ?>">Change Password</a></li>
                            <li><a href="<?php echo site_url('blog/write_blog'); ?>">Write Blog</a></li>
                            <li><a href="<?php echo site_url('blog/view_my_blog'); ?>">View My Blog</a></li>
                            <li><a href="<?php echo site_url('account/edit_photo'); ?>">Edit Photo</a></li>
                            <div class="clear"></div>
                        </ul>-->
        <?php endif; ?>
    </div>
</div>