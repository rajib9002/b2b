<?php if (common::is_logged_in()): ?>
    <div class="top_menu">
        <ul class="sf-menu">
            <li><a href="<?= site_url('home') ?>" title='Home' class="white">Home</a></li>  
            <li><a href="#" title='Settings' class="white" >Settings</a>
                <ul>
                    <li><a href="<?= site_url('settings') ?>" title='System Settings'>Reply Mail</a></li>    
                    <li><a href=" <?= site_url('settings/site_settings') ?>" title='System Settings'>Site Title</a></li>
                    <li><a href=" <?= site_url('settings/set_paypal') ?>" title='System Settings'>Paypal Settings</a></li>
                    <li><a href="<?= site_url('settings/contact') ?>" title='Contact Information'>Contact Information</a></li>

<li><a href="<?= site_url('settings/change_logo') ?>" title='Change Logo'>Change Logo</a></li>
                    <li><a href="<?= site_url('settings/change_password') ?>" title='Change Password'>Change Password</a></li>
                </ul>
            </li>
            <li><a href="#" class="white">Static Pages</a>
                <ul>
                    <li><a href="<?= site_url('static_pages/about_us') ?>">About Us</a></li>
                    <li><a href="<?= site_url('static_pages/welcome') ?>">Welcome Text Up</a></li>
                    <li><a href="<?= site_url('static_pages/welcome2') ?>">Welcome Text Down</a></li>
                    <li><a href="<?= site_url('static_pages/welcome3') ?>">Welcome Text three</a></li>
                    <li><a href="<?= site_url('static_pages/privacy_policy') ?>">Privacy Policy</a></li>
                    <li><a href="<?= site_url('static_pages/terms_of_use') ?>">Terms of Use</a></li>
                    <li><a href="<?= site_url('static_pages/spam') ?>">Spam</a></li>
                    <li><a href="<?= site_url('static_pages/careers') ?>">Careers</a></li>
                    <li><a href="<?= site_url('static_pages/payment_options') ?>">Payment Options</a></li>
                    <li><a href="<?= site_url('static_pages/advertising_fees') ?>">Advertising Fees</a></li>
                    <li><a href="<?= site_url('static_pages/how_to_use') ?>">How to Use</a></li>



                </ul>
            </li>
            <li><a href="<?= site_url('country') ?>" class="white">Country</a>
                <ul>
                    <li><a href="<?= site_url('country') ?>">Manage Country</a></li>
                    <li><a href="<?= site_url('country/new_country') ?>">Add New Country</a></li>
                </ul>
            </li>

            <li><a href="" class="white">Bike</a>
                <ul>

                    <li><a href="<?= site_url('bike/bike_type') ?>" title=''>Bike Type</a>
                        <ul>
                            <li><a href="<?= site_url('bike/bike_type') ?>" title=''>Manage Bike Type</a></li>
                            <li><a href="<?= site_url('bike/new_bike_type') ?>" title=''>Add New Bike Type</a></li>
                        </ul>
                    </li>
                    <li><a href="<?= site_url('bike/bike_company') ?>" title=''>Bike Make</a>
                        <ul>
                            <li><a href="<?= site_url('bike/bike_company') ?>" title=''>Manage Bike Make</a></li>
                            <li><a href="<?= site_url('bike/new_bike_company') ?>" title=''>Add New Make</a></li>
                        </ul>
                    </li>
                    <li><a href="<?= site_url('bike/bike_model') ?>" title='Manage Bike'>Bike Model</a>
                        <ul>
                            <li><a href="<?= site_url('bike/bike_model') ?>" title='Manage Bike'>Manage Bike Model</a></li>
                            <li><a href="<?= site_url('bike/new_bike_model') ?>" title='New Model'>Add New Bike Model</a></li>
                        </ul>
                    </li>

                </ul>
            </li> 
            <li>
                <a href="<?= site_url('area') ?>" class="white">Area</a>
                <ul>
                    <li><a href="<?= site_url('area') ?>">Manage Area</a></li>
                    <li><a href="<?= site_url('area/new_area') ?>">Add New Area</a></li>
                </ul>
            </li>
            <li>
                <a href="<?= site_url('users') ?>" class="white">Users</a>
                <ul>
                    <li><a href="<?= site_url('users') ?>">Manage Users</a></li>
                    <li><a href="<?= site_url('users/new_user') ?>">Add New User</a></li>
                </ul>
            </li>
            <li><a href="<?= site_url('ads') ?>" title='Manage Ads' class="white">Manage Ads</a></li> 
            <li><a href="<?= site_url('slider') ?>" title='Slider' class="white">Slider List</a></li>
            <li><a href="<?= site_url('static_image') ?>" title='Change Banner' class="white">Change Banner</a></li>
            <li><a href="<?= site_url('contact') ?>" title='Contact Us' class="white">Contact Mail</a></li>   

        </ul>
    </div>
    <div class="clear"></div>
<?php endif; ?>