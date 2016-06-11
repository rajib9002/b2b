
<ul class="head_menu">
    <li class="active"><a href="<?= site_url('home'); ?>">Home</a></li>
    <li><a href="<?= site_url('adz/add_adz'); ?>">Place Ad</a></li>
    <li><a href="<?= site_url('adz/index'); ?>">All Ads</a></li>
    <li><a href="<?= site_url('signup'); ?>">Sign Up</a></li>                           
    <li><a href="<?= site_url('adz/my_ads'); ?>">My Ads</a></li>
<!--    <li><a href="<?= site_url('account'); ?>">My Account</a></li>-->
    <li><a href="<?= site_url('adz/advanced_search'); ?>">Advanced Search</a></li>
    <?php
    if (common:: is_logged_in()):
        ?>

        <li><a href="<?= site_url('login/logout'); ?>">Logout</a></li>
        <li><a href="<?= site_url('account/account_password'); ?>">Change Pass</a></li>
        <?php
    else:
        ?>
        <li><a href="<?= site_url('login'); ?>">Log in</a></li>
    <?php
    endif;
    ?>

    <li><a href="<?= site_url('pages/about_us') ?>">About Us</a></li>
    <li><a href="<?= site_url('contact'); ?>">Contact Us</a></li>
</ul>


