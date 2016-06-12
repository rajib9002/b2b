<div class="content" style="background-color:#376388;padding:20px 40px;width:50%;border-radius: 5px;margin:50px auto;">
    <h2 style="font-size: 20px">Login</h2>
    <form action='<?php echo site_url('api/request_for_login')?>' method='post'  class="form_content_bike2biker">
        <div class="clear"></div>
        <input autocomplete="off" style="border:0;background-color:transparent;padding:0 40px;font-family:Raleway;font-size:14px;color:gray;margin:5px 0;height: 30px" class="pps_bg" type="text"  name="user_name"  placeholder="User Name or Email"/>
        <div class="clear"></div><br/>
        <?php
        if ($msg != '') {
            echo '<p style="color:red;margin:5px 0;padding:0;">' . "$msg" . '</p>';
        }
        ?>

        <input type="hidden" name="access_token" value="}cs;bÇñøøfÄçxŸág%zUŽ‘Âsî|Ø²"/>

        <div class="clear"></div>
        <?= form_error('user_name', '<span style=";margin:5px 0;padding:0;color:red;" class="error">', "</span>") ?>
        <input style="border:0;background-color:transparent;padding:0 40px;font-family:Raleway;font-size:14px;color:gray;margin:5px 0; height: 30px" class="password_bg" type="password" name="user_password"  placeholder="Password"/>
        <div class="clear"></div><br/>
        <?= form_error('user_password', '<span style=";margin:5px 0;padding:0;color:red;" class="error">', "</span>") ?>
        <div class="clear"></div>
        <span style="text-align:left;">Forgot Your Password &nbsp;<a style="font-weight:bold;text-decoration:underline;color:#fff; font-family: Raleway" href="<?= site_url('login/forgot_password') ?>">Click Here</a>?</span><span  style="float:right;"><a style="color:#fff;margin-right:2px;text-decoration:underline;" href="<?= site_url('signup') ?>">Create an Account</a></span>
        <div class="clear"></div>
        <input class="yellowButton login_submit_button" type="submit" name="login" value="Login"/>
    </form>
    <div class="clear"></div>
</div>
