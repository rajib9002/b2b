
<div class="content" style="background-color:#376388;padding:30px;width:250px;border-radius: 5px;margin:20px auto;">
    <h2 style="font-size: 20px">Reset Password</h2>
    <form action='<?=site_url('login/reset_password/'.$verify_code)?>' method='post'  class="form_content_bike2biker">
        
         <?php
        if ($msg != '') {
            echo '<p style="color:red;margin:5px 0;padding:0;">' . "$msg" . '</p>';
        }
        ?>
        <div class="clear"></div>
        <input autocomplete="off" style="border:0;background-color:transparent;padding:0 40px;font-family:arial;font-size:16px;color:gray;margin:5px 0; background-color: #fff;" class="pps_bg" type="text"  name="new_user_name"  placeholder="User Name"/>
        <div class="clear"></div><br/>
        <?= form_error('new_user_name', '<span style=";margin:5px 0;padding:0;color:red;" class="error">', "</span>") ?>
        <input style="border:0;background-color:transparent;padding:0 40px;font-family:arial;font-size:16px;color:gray;margin:5px 0; background-color: #fff; " class="password_bg" type="password" name="new_password"  placeholder="New Password"/>
        <div class="clear"></div><br/>
        <?= form_error('new_password', '<span style=";margin:5px 0;padding:0;color:red;" class="error">', "</span>") ?>
        <div class="clear"></div>
        
        
        <input style="border:0;background-color:transparent;padding:0 40px;font-family:arial;font-size:16px;color:gray;margin:5px 0; background-color: #fff; " class="password_bg" type="password" name="conf_password"  placeholder="Re Type New Password"/>
        <div class="clear"></div><br/>
        <?= form_error('conf_password', '<span style=";margin:5px 0;padding:0;color:red;" class="error">', "</span>") ?>
        <div class="clear"></div>
       
        <input class="yellowButton login_submit_button" style="width: 220px; font-size: 16px" type="submit" name="change_password" value="Change Password"/>
    </form>
    <div class="clear"></div>
</div>
