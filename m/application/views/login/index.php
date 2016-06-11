<div class="clear"></div>
<div class="content" style="background-color:#fff;padding:30px;width:250px;margin:10px auto; border: 0;">
      <div>
        <h2  style='border-bottom:0;font-size: 20px;text-transform: uppercase; text-align: center; color: #000; margin-bottom: 0px'>Login</h2>
        <form action='<?= site_url('login') ?>' method='post'  class="form_content_bike2biker">
            <div class="clear"></div>
             <input autocomplete="off" style="border:0;background-color:transparent;padding:0 40px;font-size:14px;color:gray;margin:0;height: 45px; width: 250px" class="pps_bg" type="text"  name="user_name"  placeholder="Username"/>
            <div class="clear"></div>
            
            <?= form_error('user_name', '<span style=";margin:5px 23px;padding:0;color:red;" class="error">', "</span>") ?>
            <input style="border:0;background-color:transparent;padding:0 40px;font-size:14px;color:gray;margin:0; width: 250px" class="password_bg" type="password" name="user_password"  placeholder="Password"/>
            <div class="clear"></div><br/>
            <?= form_error('user_password', '<span style=";margin:5px 23px;padding:0;color:red;" class="error">', "</span>") ?>
            <div class="clear"></div>
            <span style="text-align:left; font-size: 14px; margin-left: 10px; color: #000">Forgot Your Password &nbsp;
                <a style="font-weight:bold;text-decoration:underline;color:#000;" href="<?= site_url('login/forgot_password') ?>">Click Here?</a>
            </span>
           
            <div class="clear"></div>
            <input class="blue_button" type="submit" name="login" value="Login"/>
        </form>
   
        
        <br/> <br/>
        <div>
            <h2 style='border-bottom:0;font-size: 20px;text-align: left; margin: 10px 0 0 20px; color: #000'>I'm New to Bike2Biker</h2>
            <span>
                <a class="blue_button" style="width:250px" href="<?= site_url('signup') ?>">Create an Account</a>
            </span>
            <div class='clear'></div>
        </div>
        <div class="clear"></div>
    </div>
     <div class="clear"></div>
</div>
