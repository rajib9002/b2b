<div class="content" style="background-color:#376388;padding:20px 40px;width:90%;border-radius: 5px;margin:50px auto;">
    <div style="width:450px;float:left;">
        <h2  style='border-bottom:0;font-size: 20px;margin-left: 25px'>Login</h2>
        <form action='<?= site_url('login/adz_login_page') ?>' method='post'  class="form_content_bike2biker">
            <div class="clear"></div>
            <input autocomplete="off" style="border:0;background-color:transparent;padding:0 60px;font-family:Raleway;font-size:14px;color:gray;margin:5px 0;width: 400px" class="pps_bg" type="text"  name="user_name"  placeholder="User Name or Email"/>
            <div class="clear"></div><br/>
            <?php
            if ($msg != '') {
                echo '<p style="color:red;margin:5px 0;padding:0;">' . "$msg" . '</p>';
            }
            ?>
            <div class="clear"></div>
            <?= form_error('user_name', '<span style=";margin:5px 23px;padding:0;color:red;" class="error">', "</span>") ?>
            <input style="border:0;background-color:transparent;padding:0 60px;font-family:Raleway;font-size:14px;color:gray;margin:5px 0; width: 400px" class="password_bg" type="password" name="user_password"  placeholder="Password"/>
            <div class="clear"></div><br/>
            <?= form_error('user_password', '<span style=";margin:5px 23px;padding:0;color:red;" class="error">', "</span>") ?>
            <div class="clear"></div>
            <span style="text-align:left; font-size: 14px; margin-left: 25px">Forgot Your Password &nbsp;
                <a style="font-weight:bold;text-decoration:underline;color:#fff;" href="<?= site_url('login/forgot_password') ?>">Click Here</a>?
            </span>
            <span  style="float:right;">
                <!--<a style="color:#fff;margin-right:2px;" href="<?= site_url('signup') ?>">Create an Account</a>-->
            </span>
            <div class="clear"></div>
            <input class="yellowButton login_submit_button" style="margin-right: 30px" type="submit" name="login" value="Login"/>
        </form>
    </div>
    <div style="width:350px;float:left">
        <div style='width:323px;margin:40px auto;border-left:1px solid #446c90;text-align:center;padding-left:20px;'>
            <h2 style='border-bottom:0;font-size: 20px;text-align: center; margin-left: 60px'>I'm New to Bike2Biker</h2>
            <p style='color:#fff;font-size:12px;font-family:arial;text-align: center'>
               
            </p>
            <span style="float:right; margin-top: 20px">
                <a style="border:0;background-color:transparent;font-family:Raleway; border-radius: 5px;font-size:18px;color:#000;width:200px; height: 30px; margin:5px 0; padding:10px 30px;font-weight:bold;text-align: center; text-transform: uppercase;" class="create_account_button" href="<?= site_url('signup') ?>">Create an Account</a>
            </span>
            <div class='clear'></div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>
