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
    <div class="header_new_left float_left"><a href="<?= site_url('adz'); ?>"><img src="<?= base_url() ?>/uploads/welcome_right/<?php echo $lg['logo'] ?>"width="190px" height="112px"/></a></div>
    <div class="header_new_right float_right">
        <ul id="header_menu" class="header_menu">
            <li>
                <a title="Contact Us" href="<?php echo site_url('contact')?>"><img src="<?php echo base_url() ?>/images/icon/contact.png" width="40px" height="40px" alt=""/>
                    <span class="sdt_active"></span>
                    <span class="sdt_wrap">
                        <span class="sdt_link"></span>
                    </span>
                </a>
            </li>
            <li>
                <a title="Competition" href="<?= site_url('competition'); ?>"><img src="<?php echo base_url() ?>/images/icon/competition.png" width="40px" height="40px" alt=""/>
                    <span class="sdt_active"></span>
                    <span class="sdt_wrap">
                        <span class="sdt_link"></span>
                    </span>
                </a>
            </li>
            
             <?php
                if (common:: is_logged_in()): ?>
            
            <li>
                <a href="<?= site_url('adz/my_ads'); ?>" title="My ads"><img src="<?php echo base_url() ?>/images/icon/my_ads.png" width="40px" height="40px" alt=""/>

                    <span class="sdt_active"></span>
                    <span class="sdt_wrap">
                        <span class="sdt_link"></span>
                    </span>
                </a>
            </li>
            <li>
                <a title="logout" href="<?= site_url('login/logout'); ?>"><img src="<?php echo base_url() ?>/images/icon/logout.png" width="40px" height="40px" alt=""/>

                    <span class="sdt_active"></span>
                    <span class="sdt_wrap">
                        <span class="sdt_link"></span>
                    </span>
                </a>
            </li>
            <li>
                <a title="Change Password" href="<?= site_url('account/account_password'); ?>"><img src="<?php echo base_url() ?>/images/icon/password.png" width="40px" height="40px" alt=""/>

                    <span class="sdt_active"></span>
                    <span class="sdt_wrap">
                        <span class="sdt_link"></span>
                    </span>
                </a>
            </li>
            
            
            
            
            
            
            <?php
                else:
                    ?>
            <li>
                <a href="<?= site_url('login'); ?>" title="Login"><img src="<?php echo base_url() ?>/images/icon/login.png" width="40px" height="40px" alt=""/>

                    <span class="sdt_active"></span>
                    <span class="sdt_wrap">
                        <span class="sdt_link"></span>
                    </span>
                </a>
            </li>
            
            <?php
                endif;
                ?>
            
            
            
            
            
            
            
            
            
            
            
            <li>
                <a title="Advanced Search" href="<?= site_url('adz/advanced_search'); ?>"><img src="<?php echo base_url() ?>/images/icon/advanced.png" width="40px" height="40px" alt=""/>
                    <span class="sdt_active"></span>
                    <span class="sdt_wrap">
                        <span class="sdt_link"></span>
                    </span>
                </a>
            </li>
            <li>
                <a title="Signup" href="<?= site_url('signup'); ?>"><img src="<?php echo base_url() ?>/images/icon/signup.png" width="40px" height="40px" alt=""/>

                    <span class="sdt_active"></span>
                    <span class="sdt_wrap">
                        <span class="sdt_link"></span>
                    </span>
                </a>
            </li>
            <li>
                <a title="Wanted Ads" href="<?= site_url('adz/index/2'); ?>"><img src="<?php echo base_url() ?>/images/icon/want.png" width="40px" height="40px" alt=""/>
                    <span class="sdt_active"></span>
                    <span class="sdt_wrap">
                        <span class="sdt_link"></span>
                    </span>
                </a>
            </li>
             <li>
                <a title="Sale Ads" href="<?= site_url('adz/index/1'); ?>"><img src="<?php echo base_url() ?>/images/icon/sale.png" width="40px" height="40px" alt=""/>
                    <span class="sdt_active"></span>
                    <span class="sdt_wrap">
                        <span class="sdt_link"></span>
                    </span>
                </a>
            </li>
            
            <li>
                <a title="All Ads" href="<?= site_url('adz/all_advertise'); ?>"><img src="<?php echo base_url() ?>/images/icon/ads.png" width="40px" height="40px" alt=""/>
                    <span class="sdt_active"></span>
                    <span class="sdt_wrap">
                        <span class="sdt_link"></span>
                    </span>
                </a>
            </li>
            <li>
                <a title="Home" href="<?= site_url('adz'); ?>"><img src="<?php echo base_url() ?>/images/icon/home.png" width="40px" height="40px" alt=""/>

                    <span class="sdt_active"></span>
                    <span class="sdt_wrap">
                        <span class="sdt_link"></span>
                    </span>
                </a>
            </li>








            <div class="clear"></div>

        </ul>
		</div>














        <!--            <ul class="head_menu">
        
        
        
        
        
        
        
        <?php
        if (common:: is_logged_in()):
            ?>
                                        <li><a href="<?= site_url('adz/my_ads'); ?>">My Ads</a></li>
                                    <li><a href="<?= site_url('login/logout'); ?>">Logout</a></li>
                                        <li><a href="<?= site_url('account/account_password'); ?>">Change Pass</a></li>
            <?php
        else:
            ?>
                                    <li><a href="<?= site_url('login'); ?>">Log in</a></li>
        <?php
        endif;
        ?>
        
        
        
                        <li><a href="<?= site_url('adz/advanced_search'); ?>">Advanced</a></li>
                        <li><a href="<?= site_url('competition'); ?>">Competition</a></li>
                        <li><a href="<?= site_url('adz/index/2'); ?>">Wanted Ads</a></li>
                        <li><a href="<?= site_url('adz/index/1'); ?>">Sale Ads</a></li>
                        <li><a href="<?= site_url('adz/index'); ?>">All Ads</a></li>
                        <li><a href="<?= site_url('signup'); ?>">Sign Up</a></li>
                        <li class="active"><a href="<?= site_url('adz'); ?>">Home</a></li>
        
        
                    </ul>-->




        <!--        <div class="search_var_all">
                    <form class="form_new_content" method="post" action="<?= site_url('adz/index'); ?>">
                        <span class="float_left" style="width:111px">
                            &nbsp;
        </span>
                        <span class="float_left">
                            <select class="select-style2 gender2 jload_area" name="country_id"><?= common::get_country_options($country_id) ?></select>
                        </span>
                        <span class="float_left">
                            <select class="select-style2 gender2 jarea" id="j_area_data" name="area_id"><?= $this->mod_adz->get_area_options($country_id, $area_id) ?></select>
                        </span>
                        <span class="float_left">
                            <select class="select-style2 gender2 jtype" name="type_id"><?= common::get_bike_type($t_id) ?></select>
                        </span>
                        <span class="float_left">
                            <select class="select-style2 gender2 jmake" id="j_make_data" name="company_id"><?= common::get_bike_company_by_r($t_id, $make_id) ?></select>
                        </span>
                        <span class="float_left">
                            <select class="select-style2 gender2 jmodel" id="j_model_data" name="model_id"><?= common::get_bike_model($model_id) ?> ?></select>
                        </span>
                        <span class="float_right">
                            <input class="search_new" style="border:0;background-color: transparent;margin: 0;padding: 0;" type="submit" value="Search" name="search"/>
                        </span>
                    </form>
                </div>
            </div>-->

    </div>
    <div class="clear"></div>
