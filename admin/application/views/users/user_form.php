<div class='form_content' style="width:750px;">
    <div class="ui-jqdialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix form_title">
        <span class="ui-jqdialog-title"><?= $page_title ?></span>
    </div>
    <form action='<?= site_url($action); ?>' method='post'>
        <table cellpadding=0 cellspacing=1>            

            <tr>
                <th>User Name <span class='req_mark'>*</span></th>
                <td><input type='text' name='user_name' value='<?= set_value('user_name', $user_name) ?>' class='text ui-widget-content ui-corner-all width_160' /><?= form_error('user_name', '<span>', '</span>') ?></td>
            </tr>
            <tr>
                <th>Password <span class='req_mark'>*</span></th>
                <td><input type='password' name='user_password' id="user_password" value='<?= set_value('user_password', $user_password) ?>' class='text ui-widget-content ui-corner-all width_160' /><?= form_error('user_password', '<span>', '</span>') ?></td>
            </tr>
            <tr>
                <th>Confirm Password <span class='req_mark'>*</span></th>
                <td><input type='password' name='confirm_password' value='<?= set_value('confirm_password', $user_password) ?>' class='text ui-widget-content ui-corner-all width_160' /><?= form_error('confirm_password', '<span>', '</span>') ?></td>
            </tr>
            <tr>
                <th>First Name <span class='req_mark'>*</span></th>
                <td><input type='text' name='user_first_name' value='<?= set_value('user_first_name', $user_first_name) ?>' class='text ui-widget-content ui-corner-all width_160' /><?= form_error('user_first_name', '<span>', '</span>') ?></td>
            </tr>
            <tr>
                <th>Last Name <span class='req_mark'>*</span></th>
                <td><input type='text' name='user_last_name' value='<?= set_value('user_last_name', $user_last_name) ?>' class='text ui-widget-content ui-corner-all width_160' /><?= form_error('user_last_name', '<span>', '</span>') ?></td>
            </tr>                
            <tr>
                <th>User Email <span class='req_mark'>*</span></th>
                <td><input type='text' name='user_email' value='<?= set_value('user_email', $user_email) ?>' class='text ui-widget-content ui-corner-all width_160' /><?= form_error('user_email', '<span>', '</span>') ?></td>
            </tr>
            <tr>
                <th>User Phone <span class='req_mark'>*</span></th>
                <td><input type='text' name='user_phone' value='<?= set_value('user_phone', $user_phone) ?>' class='text ui-widget-content ui-corner-all width_160' /><?= form_error('user_phone', '<span>', '</span>') ?></td>
            </tr>
            
            
             <tr>
                <th>Menu Access <span class='req_mark'>*</span></th>
                <td>
                    
                    <input type='radio' name='full_access' value='0' <?php  if($full_access=='0') { ?> checked="yes" <?php } ?>/>Only Competition
                    <input type='radio' name='full_access' value='1' <?php if($full_access=='1') { ?> checked="yes" <?php } ?>/> Full Access
                   <?= form_error('full_access', '<span>', '</span>') ?>
                </td>
            </tr>
       

        </table>
        <table cellpadding=0 cellspacing=1>  

            <tr><td>&nbsp;</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>Set User Permission (if you click the checkbox then it will be visible)</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>&nbsp;</td></tr>

            <tr>
                <td><b>Settings</b></td>
            </tr>
            <tr>
                <td colspan="8">
                    <input type="checkbox" name="reply_mail" value="1" <?php if($reply_mail==1){?>checked="checked"<?php }?>/>Reply Mail
                    <input type="checkbox" name="site_title" value="1" <?php if($site_title==1){?>checked="checked"<?php }?>/>Site Title
                    <input type="checkbox" name="paypal_settings" value="1" <?php if($paypal_settings==1){?>checked="checked"<?php }?>/>Paypal Settings
                    <input type="checkbox" name="contact_information" value="1" <?php if($contact_information==1){?>checked="checked"<?php }?>/>Contact Information
                    <input type="checkbox" name="change_logo" value="1" <?php if($change_logo==1){?>checked="checked"<?php }?>/>Change Logo
                    <input type="checkbox" name="change_password" value="1" <?php if($change_password==1){?>checked="checked"<?php }?>/>Change Password
                    <input type="checkbox" name="contact_mail" value="1" <?php if($contact_mail==1){?>checked="checked"<?php }?>/>Contact Mail
                </td>
            </tr>   
            <tr>
                <td><b>Static Pages</b></td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" name="about" value="1" <?php if($about==1){?>checked="checked"<?php }?>/>About Us
                    <input type="checkbox" name="welcome1" value="1" <?php if($welcome1==1){?>checked="checked"<?php }?>/>Welcome Text Up
                    <input type="checkbox" name="welcome2" value="1" <?php if($welcome2==1){?>checked="checked"<?php }?>/>Welcome Text Down
                    <input type="checkbox" name="welcome3" value="1" <?php if($welcome3==1){?>checked="checked"<?php }?>/>Welcome Text three
                    <input type="checkbox" name="privacy" value="1" <?php if($privacy==1){?>checked="checked"<?php }?>/>Privacy Policy
                    <input type="checkbox" name="terms" value="1" <?php if($terms==1){?>checked="checked"<?php }?>/>Terms of Use
                    <input type="checkbox" name="spam" value="1" <?php if($spam==1){?>checked="checked"<?php }?>/>Spam
                    <input type="checkbox" name="careers" value="1" <?php if($careers==1){?>checked="checked"<?php }?>/>Careers
                    <input type="checkbox" name="payment" value="1" <?php if($payment==1){?>checked="checked"<?php }?>/>Payment Options
                    <input type="checkbox" name="ads_fees" value="1" <?php if($ads_fees==1){?>checked="checked"<?php }?>/>Advertising Fees
                    <input type="checkbox" name="how" value="1" <?php if($how==1){?>checked="checked"<?php }?>/>How to Use
                    <input type="checkbox" name="club" value="1" <?php if($club==1){?>checked="checked"<?php }?>/>Club
                </td>
            </tr>
            <tr>
                <td><input type="checkbox" name="country" value="1" <?php if($country==1){?>checked="checked"<?php }?>/>Country</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="type" value="1" <?php if($type==1){?>checked="checked"<?php }?>/>Bike type</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="make" value="1" <?php if($make==1){?>checked="checked"<?php }?>/>Bike Make</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="model" value="1" <?php if($model==1){?>checked="checked"<?php }?>/>Bike Model</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="area" value="1" <?php if($area==1){?>checked="checked"<?php }?>/>Area</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="users" value="1" <?php if($users==1){?>checked="checked"<?php }?>/>Users</td>
            </tr>
            <tr>
                <td><b>Competition Venue</b></td>
            </tr>
            <tr>
                <td>

                    <input type="checkbox" name="class" value="1" <?php if($class==1){?>checked="checked"<?php }?>/>Class
                    <input type="checkbox" name="competition" value="1" <?php if($competition==1){?>checked="checked"<?php }?>/>Competition
                    <input type="checkbox" name="c_details" value="1" <?php if($c_details==1){?>checked="checked"<?php }?>/>Competition Details
                    <input type="checkbox" name="rider" value="1" <?php if($rider==1){?>checked="checked"<?php }?>/>Rider
                    <input type="checkbox" name="c_result" value="1" <?php if($c_result==1){?>checked="checked"<?php }?>/>Competition Result

                </td>
            </tr>
            <tr>
                <td><input type="checkbox" name="manage_ads" value="1" <?php if($manage_ads==1){?>checked="checked"<?php }?>/>Manage advertise</td>
            </tr>

            <tr>
                <td><input type="checkbox" name="slider" value="1" <?php if($slider==1){?>checked="checked"<?php }?>/>Slider</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="banner" value="1" <?php if($banner==1){?>checked="checked"<?php }?>/>Banner</td>
            </tr>
        </table>




        <table>
            <tr><th>&nbsp;</th>
                <td>
                    <input type="hidden" name="sess_value" value="<?= $user_id ?>" />
                    <input type='submit' name='save' value='Save' class="button" /> 
                    <input type='button' value='cancel' class="cancel"/>
                </td>
            </tr>
        </table>



    </form>
</div>