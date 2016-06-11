
<div class="step2_upper" style="margin-left: 20">
    <h2>Contact Us</h2>
</div>

<div class="content" style="background-color:#376388;padding:20px;width:80%;border-radius: 5px;margin:20px auto 50px 40px;">
    <div style="width:380px;float:left;">
        <h2 style='font-size: 20px; margin: 20px 0px 20px 40px; padding: 0; border: 0'>Send us a message!</h2>
        <form action='<?= site_url('contact/e_mail') ?>' method='post'  class="form_content_bike2biker" style="border-right:1px solid #446c90; margin: 0">
                        
            <div class="clear"></div>
           <?php
           $contact = common::get_settings_data();
            if ($msg != '') {
                echo '<p style="color:red;margin:5px 0;padding:0;">' . "$msg" . '</p>';
            }
            ?>
           <div class="clear"></div>
            <input autocomplete="off" style="border:0;background-color:transparent;padding:0 30px;font-family:arial;font-size:14px;color:gray; margin:5px 0;height: 30px" class="user_bg" type="text"  name="contact_name"  placeholder="Name" value="<?= $_REQUEST[contact_name] ?>"/>
            <div class="clear"></div>
            <?= form_error('contact_name', '<span style=";margin:5px 38px;padding:0;color:red;" class="error">', "</span>") ?>
            <input style="border:0;background-color:transparent;padding:0 30px;font-family:arial;font-size:14px;color:gray;margin:5px 0;height: 30px" class="email_bg" type="email" name="contact_email"  placeholder="Email" value="<?= $_REQUEST[contact_email] ?>"/>
            <div class="clear"></div>
            <?= form_error('contact_email', '<span style=";margin:5px 38px;padding:0;color:red;" class="error">', "</span>") ?>
            <div class="clear"></div>
             <div class="clear"></div>
            <input autocomplete="off" style="border:0;background-color:transparent;padding:0 30px;font-family:arial;font-size:14px;color:gray;margin:5px 0;height: 30px" class="subject_bg" type="text"  name="contact_subject"  placeholder="Subject" value="<?= $_REQUEST[contact_subject] ?>"/>
            <div class="clear"></div>
            <?= form_error('contact_subject', '<span style=";margin:5px 38px;padding:0;color:red;" class="error">', "</span>") ?>
            <textarea autocomplete="off" style="border:0;background-color:transparent;padding:10px 30px;font-family:arial;font-size:14px;color:gray;margin:5px 0;" class="message_bg" name="contact_message" style="height: 100px; resize:none;" placeholder="Message" /> <?= $_REQUEST[contact_message] ?></textarea>
            <div class="clear"></div>
            <?= form_error('contact_message', '<span style=";margin:5px 38px;padding:0;color:red;" class="error">', "</span>") ?>
            
            <div class="clear"></div>
            <input class="yellowButton login_submit_button" style="margin-right: 40px" type="submit" name="submit" value="Send"/>
        </form>
    </div>
    <br/><br/>
    <div style="width:350px;float:left">
        <div style='width:323px;margin:50px 30px 0px 50px;text-align:center;padding-left:20px;'>
            <h2 style='border-bottom:0;font-size: 18px;margin: 0'>Contact Information</h2>
              <p style="text-align:left; color:#fff; font-size: 14x; padding: 2px 0px; margin: 0">  
                <img src="images/telephone_icon.png" width="14px" height="14px"/><strong style="font-size: 14px; margin-left: 5px">Tel :</strong> <?php echo $contact['company_phone']; ?> 
            </p>
             <div class="clear"></div>
           <p style="text-align:left; color:#fff; font-size: 14px; padding: 2px 0px; margin: 0">             
                <img src="images/email_icon.png" width="14px" height="14px" /><strong style="font-size: 14px; margin-left: 5px">  Email :</strong> <?= $contact['notify_email']; ?>
            </p>
             <div class="clear"></div>
          <p style="text-align:left; color:#fff; font-size: 14px; padding: 2px 0px; margin: 0">      
               <img src="images/location_icon.png"  width="14px" height="14px"/><strong style="font-size: 14px; margin-left: 5px">Address :</strong>
                <?= $contact['company_address']; ?>
            </p>
           
            <br/> <br/><br/> <br/>  <br/> 
            
            <h2 style='border-bottom:0;font-size: 18px; margin: 0'>Follow Us</h2>
            <div class="shared_icon" style="float: left">
            <a href=""><img src="img/g.png"></a>
            <a href=""><img src="img/e.png"></a>
            <a href=""><img src="img/y.png"></a>
            <a href=""><img src="img/t.png"></a>
            <a href=""><img src="img/f.png"></a>
            <div class="clear"></div>
            
        </div>
            
            <div class='clear'></div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>



