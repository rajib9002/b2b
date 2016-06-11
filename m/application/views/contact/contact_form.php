<!--<div class="content" style="background-color:#376388;padding:20px 40px;width:50%;border-radius: 5px;margin:20px auto;">
    <h2 style="font-size: 20px">Contact Us</h2>
    <div style="width:400px;float:left;">
        <div style='margin:10px 0px;text-align:center;padding-left:50px;'>
            <h2 style='border-bottom:0;font-size: 18px;margin: 0'>Contact Information</h2>
              <p style="text-align:left; color:#fff; font-size: 14px; padding: 2px 0px; margin: 0">  
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

             <div class='clear'></div>
        </div>
        <div class="clear"></div>
    </div>-->
    
    <div class="content_m">
        <h2 style='font-size: 18px; padding: 0; border: 0;text-align:center;'>Send us a message!</h2>
        <form action='<?= site_url('contact/e_mail') ?>' method='post'  class="form_content_bike2biker">
                        
            <div class="clear"></div>
           <?php
           $contact = common::get_settings_data();
            if ($msg != '') {
                echo '<p style="color:white;margin:5px 0;padding:0;">' . "$msg" . '</p>';
            }
            ?>
           <div class="clear"></div>
            <input autocomplete="off"  type="text"  class="select-style2 " name="contact_name"  placeholder="Name" value="<?= $_REQUEST[contact_name] ?>"/>
            <div class="clear"></div>
            <?= form_error('contact_name', '<span style=";margin:5px 50px;padding:0;color:white;" class="error">', "</span>") ?>
            <input class="select-style2 " type="email" name="contact_email"  placeholder="Email" value="<?= $_REQUEST[contact_email] ?>"/>
            <div class="clear"></div>
            <?= form_error('contact_email', '<span style=";margin:5px 50px;padding:0;color:white;" class="error">', "</span>") ?>
            <div class="clear"></div>
             <div class="clear"></div>
            <input autocomplete="off" class="select-style2 " type="text"  name="contact_subject"  placeholder="Subject" value="<?= $_REQUEST[contact_subject] ?>"/>
            <div class="clear"></div>
            <?= form_error('contact_subject', '<span style=";margin:5px 50px;padding:0;color:white;" class="error">', "</span>") ?>
            <textarea autocomplete="off" class="select-style2 " name="contact_message" style="height: 100px; resize:none;width:100%;" placeholder="Message" /> <?= $_REQUEST[contact_message] ?></textarea>
            <div class="clear"></div>
            <?= form_error('contact_message', '<span style=";margin:5px 50px;padding:0;color:white;" class="error">', "</span>") ?>
            
            <div class="clear"></div>
             


<div class="button_p_n">
            <input  class="previous_button" type="submit" onclick="history.back(-1)" value="Previous"/>
            <input  class="next_button" type='submit' name='submit' value='Send'/>
            <div class="clear"></div>
        </div>

        </form>

    <br/><br/>
   
    <div class="clear"></div>
</div>



