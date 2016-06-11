<?php if (common::is_logged_in()): ?>
    <?php $user_id = $this->session->userdata('user_id');

    $info = sql::row("users", "user_id=$user_id"); ?>


    <div class="top_menu">
        <ul class="sf-menu">
            <li><a href="<?= site_url('home') ?>" title='Home' class="white">Home</a></li>  
            <li><a href="#" title='Settings' class="white" >Settings</a>
                <ul>
                    <?php if ($info['reply_mail'] == 1) { ?>
                        <li><a href="<?= site_url('settings') ?>" title='System Settings'>Reply Mail</a></li>    

                    <?php } ?><?php if ($info['site_title'] == 1) { ?>
                        <li><a href=" <?= site_url('settings/site_settings') ?>" title='System Settings'>Site Title</a></li>
                    <?php } ?><?php if ($info['paypal_settings'] == 1) { ?>
                        <li><a href=" <?= site_url('settings/set_paypal') ?>" title='System Settings'>Paypal Settings</a></li>
                    <?php } ?><?php if ($info['contact_information'] == 1) { ?>
                        <li><a href="<?= site_url('settings/contact') ?>" title='Contact Information'>Contact Information</a></li>
                    <?php } ?><?php if ($info['change_logo'] == 1) { ?>
                        <li><a href="<?= site_url('settings/change_logo') ?>" title='Change Logo'>Change Logo</a></li>
                    <?php } ?><?php if ($info['change_password'] == 1) { ?>
                        <li><a href="<?= site_url('settings/change_password') ?>" title='Change Password'>Change Password</a></li>
                    <?php } ?><?php if ($info['contact_mail'] == 1) { ?>
                        <li><a href="<?= site_url('contact') ?>" title='Contact Us'>Contact Mail</a></li>
                        <li><a href=" <?= site_url('settings/social_weblink') ?>" title='Social Settings'>Social Web site Link</a></li>
                    <?php } ?>
                </ul>
            </li>
            <li><a href="#" class="white">Static Pages</a>
                <ul>
<li><a href="<?= site_url('static_pages/schedule') ?>">Schedule</a></li>

                    <?php if ($info['about'] == 1) { ?>
                        <li><a href="<?= site_url('static_pages/about_us') ?>">About Us</a></li>
                    <?php } ?><?php if ($info['welcome1'] == 1) { ?>
                        <li><a href="<?= site_url('static_pages/welcome') ?>">Welcome Text Up</a></li>
                    <?php } ?><?php if ($info['welcome2'] == 1) { ?>
                        <li><a href="<?= site_url('static_pages/welcome2') ?>">Welcome Text Down</a></li>
                    <?php } ?><?php if ($info['welcome3'] == 1) { ?>
                        <li><a href="<?= site_url('static_pages/welcome3') ?>">Welcome Text three</a></li>
                    <?php } ?><?php if ($info['privacy'] == 1) { ?>
                        <li><a href="<?= site_url('static_pages/privacy_policy') ?>">Privacy Policy</a></li>
                    <?php } ?><?php if ($info['terms'] == 1) { ?>
                        <li><a href="<?= site_url('static_pages/terms_of_use') ?>">Terms of Use</a></li>
                    <?php } ?><?php if ($info['spam'] == 1) { ?>
                        <li><a href="<?= site_url('static_pages/spam') ?>">Spam</a></li>
                    <?php } ?><?php if ($info['careers'] == 1) { ?>
                        <li><a href="<?= site_url('static_pages/careers') ?>">Careers</a></li>
                    <?php } ?><?php if ($info['payment'] == 1) { ?>
                        <li><a href="<?= site_url('static_pages/payment_options') ?>">Payment Options</a></li>
                    <?php } ?><?php if ($info['ads_fees'] == 1) { ?>
                        <li><a href="<?= site_url('static_pages/advertising_fees') ?>">Advertising Fees</a></li>
                    <?php } ?><?php if ($info['how'] == 1) { ?>
                        <li><a href="<?= site_url('static_pages/how_to_use') ?>">How to Use</a></li>
                    <?php } ?><?php if ($info['club'] == 1) { ?>
                        <li><a href="<?= site_url('static_pages/club') ?>">Club</a></li>
                    <?php } ?>
<li><a href="<?= site_url('static_pages/legal') ?>">Legal</a></li>
                </ul>
            </li>
            <?php if ($info['country'] == 1) { ?>
                <li><a href="<?= site_url('country') ?>" class="white">Country</a>
                    <ul>
                        <li><a href="<?= site_url('country') ?>">Manage Country</a></li>
                        <li><a href="<?= site_url('country/new_country') ?>">Add New Country</a></li>
                    </ul>
                </li>
            <?php } ?>

            <li><a href="" class="white">Bike</a>
                <ul>
                    
                   
                   
                        <?php if ($info['type'] == 1) { ?>
                        <li><a href="<?= site_url('bike/bike_main_type') ?>" title=''>Bike Main Type</a>
                            <ul>
                                <li><a href="<?= site_url('bike/bike_main_type') ?>" title=''>Manage Bike Main Type</a></li>
                                <li><a href="<?= site_url('bike/new_bike_main_type') ?>" title=''>Add New Bike Main Type</a></li>
                            </ul>
                        </li>
                        <li><a href="<?= site_url('bike/bike_type') ?>" title=''>Bike Type</a>
                            <ul>
                                <li><a href="<?= site_url('bike/bike_type') ?>" title=''>Manage Bike Type</a></li>
                                <li><a href="<?= site_url('bike/new_bike_type') ?>" title=''>Add New Bike Type</a></li>
                            </ul>
                        </li>
                        
                    <?php } ?>
                         <?php if ($info['make'] == 1) { ?>
                        <li><a href="<?= site_url('bike/bike_make') ?>" title=''>Bike Make</a>
                            <ul>
                                <li><a href="<?= site_url('bike/bike_make') ?>" title=''>Manage Bike Make</a></li>
                                <li><a href="<?= site_url('bike/new_bike_make') ?>" title=''>Add New Make</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                         <?php if ($info['model'] == 1) { ?>
                        <li><a href="<?= site_url('bike/bike_model') ?>" title='Manage Bike'>Bike Model</a>
                            <ul>
                                <li><a href="<?= site_url('bike/bike_model') ?>" title='Manage Bike'>Manage Bike Model</a></li>
                                <li><a href="<?= site_url('bike/new_bike_model') ?>" title='New Model'>Add New Bike Model</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                </ul>
            </li> 
            <?php if ($info['area'] == 1) { ?>
                <li>
                    <a href="<?= site_url('area') ?>" class="white">Area</a>
                    <ul>
                        <li><a href="<?= site_url('area') ?>">Manage Area</a></li>
                        <li><a href="<?= site_url('area/new_area') ?>">Add New Area</a></li>
                    </ul>
                <?php } ?></li>

            <?php if ($info['users'] == 1) { ?>
                <li>
                    <a href="<?= site_url('users') ?>" class="white">Users</a>
                    <ul>
                        <li><a href="<?= site_url('users') ?>">Manage Users</a></li>
                        <li><a href="<?= site_url('users/new_user') ?>">Add New User</a></li>
                    </ul>
                </li>
            <?php } ?>

            <li>
                <a href="#" class="white">Competiton Venue</a>
                <ul>
                    <li><a href="#">Result</a>
                        <ul> 
            
                                <li><a href="<?= site_url('rider_class') ?>">Class</a></li>
                            
                                <li><a href="<?= site_url('competitionr') ?>">Competition</a></li>
                          
                                <li><a href="<?= site_url('competitionr_details') ?>">Competition Details</a></li>
                            
                                <li><a href="<?= site_url('rider') ?>">Rider</a></li>
                           
                                <li><a href="<?= site_url('competition_result') ?>">Competition Result</a></li>
                        
                        </ul>
                    </li>
                    
                    <li><a href="<?= site_url('club') ?>">Host Club</a>
                       <ul>
                        <li><a href="<?= site_url('club') ?>">Manage Club</a></li>
                        <li><a href="<?= site_url('club/new_club') ?>">Add New Club</a></li>
                    </ul>
                    </li>
                    
                    <li><a href="<?= site_url('host_body') ?>">Host Body</a>
                       <ul>
                        <li><a href="<?= site_url('host_body') ?>">Manage Host Body</a></li>
                        <li><a href="<?= site_url('host_body/new_host_body') ?>">Add New Host Body</a></li>
                    </ul>
                    </li>
                    
                    
                    <li><a href="<?= site_url('discipline') ?>">Discipline</a>
                       <ul>
                        <li><a href="<?= site_url('discipline') ?>">Manage Discipline</a></li>
                        <li><a href="<?= site_url('discipline/new_discipline') ?>">Add New Discipline</a></li>
                    </ul>
                    </li>
                    
                </ul>
            </li>
            <?php if ($info['manage_ads'] == 1) { ?>
                <li><a href="<?= site_url('ads/index/road_bikes') ?>" title='Manage Ads' class="white">Manage Ads</a></li> 
            <?php } ?><?php if ($info['slider'] == 1) { ?>
                <!--<li><a href="<?//= site_url('slider') ?>" title='Slider' class="white">Slider</a></li>-->
            <?php } ?><?php if ($info['banner'] == 1) { ?>
                <li><a href="<?= site_url('static_image') ?>" title='Change Banner' class="white">Banner & Ad</a>
                <ul>
                    <li><a href="<?= site_url('static_image') ?>" title='Change Banner'>Banner</a>
                    <li><a href="<?= site_url('ad_image') ?>" title='Change Ad Image'>Ad Here Img</a></li>
                </ul>
                </li>
            <?php } ?>
                 
        </ul>
    </div>
    <div class="clear"></div>
<?php endif; ?>