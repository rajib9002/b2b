<div class="content" style="background-color:#376388;padding:20px 40px;width:50%;border-radius: 5px;margin:50px auto">
    <h2 style="font-size: 20px">Forgot Password</h2>
    <form action='<?=site_url('login/forgot_password')?>' method='post'  class="form_content_bike2biker">
      
        <?php
        if ($msg != '') {
            echo '<p style="color:red;margin:5px 0;padding:0;">' . "$msg" . '</p>';
        }
        ?>
        <div class="clear"></div>
        <?= form_error('email', '<span style=";margin:5px 0;padding:0;color:red;" class="error">', "</span>") ?>
        <input style="border:0;background-color:transparent;padding:0 40px;font-family:Raleway;font-size:14px;color:gray;width:465px;margin:5px 0; background-color: #fff;" class="email_bg" type="email" name="email"  placeholder="Email"/>
        <div class="clear"></div><br/>
      
        <input class="yellowButton login_submit_button" style="margin-right: 2px;" type="submit" name="send" value="Send"/>
    </form>
    <div class="clear"></div>
</div>



