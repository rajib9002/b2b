<div class="content" style="background-color:#fff;padding:30px;width:250px;margin:10px auto;">
    <h2  style='border-bottom:0;font-size: 20px;text-transform: uppercase; text-align: center; color: #000; margin-bottom: 0px'>Forgot Password</h2>
    <form action='<?=site_url('login/forgot_password')?>' method='post'  class="form_content_bike2biker">
      
        <div class="clear"></div>
        <?= form_error('email', '<span style=";margin:5px 0;padding:0;color:red;" class="error">', "</span>") ?>
        <input style="border:0;background-color:transparent;padding:0 60px;font-family:Raleway;font-size:14px;color:gray;width:250px;margin:5px 0; background-color: #fff;" class="email_bg" type="email" name="email"  placeholder="Email"/>
             
        <input class="blue_button" type="submit" name="send" value="Send"/>
    </form>
    <div class="clear"></div>
</div>



