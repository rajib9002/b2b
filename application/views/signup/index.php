<div class="content" style="background-color:#376388;padding:20px 40px;width:90%;border-radius: 5px;margin:20px auto;">
    <h2 style="font-size: 20px">Sign-up Form</h2>
    <div class='form_content' style="width:100%;">
        <?php
        if ($msg != '') {
            echo "<div class='success'>" . $msg . "</div>";
        }
        ?>

        <form id="form" action='<?= site_url($action); ?>' method='post'>
            <?php
            if ($msg != '') {
                echo "<div class='error'>" . $msg . "</div>";
            }
            ?>
            <table class="rajib_table_content" style="width:50%;float:left;">
            
                <tr>
                    <th valign="top">User Name</th>
                    <td>
                        <input type="text" name='user_name' value='<?= set_value('user_name', $user_name) ?>' />
                        <?= form_error('user_name', '<span style="display:block;color:red;">', '</span>') ?>
                    </td>
                </tr>
                <tr>
                    <th valign="top">First Name</th>


                    <td><input type="text" name='user_first_name' value='<?= set_value('user_first_name', $user_first_name) ?>' />
                        <?= form_error('user_first_name', '<span style="display:block;color:red;">', '</span>') ?>
                    </td>

                </tr>
                <tr>
                    <th valign="top">Last Name</th>

                    <td>
                        <input type="text" name='user_last_name' value='<?= set_value('user_last_name', $user_last_name) ?>' />
                        <?= form_error('user_last_name', '<span style="display:block;color:red;">', '</span>') ?>
                    </td>
                </tr>
                <tr>
                    <th valign="top">Password

                    </th>
                    <td>
                        <input type='password' name='user_password' id="user_password" value='<?= set_value('user_password', $user_password) ?>' />
                        <?= form_error('user_password', '<span style="display:block;color:red;">', '</span>') ?>
                    </td>
                </tr>
                <tr>
                    <th valign="top">Confirm Password

                    </th>
                    <td>
                        <input  type='password' name='confirm_password' value='<?= set_value('confirm_password', $user_password) ?>' />
                        <?= form_error('confirm_password', '<span style="display:block;color:red;">', '</span>') ?>
                    </td>
                </tr>
            </table>
            <table class="rajib_table_content" style="width:50%;float:left;">
               
                <tr>
                    <th valign="top">Email

                    </th>
                    <td>
                        <input type="text" name='user_email' value='<?= set_value('user_email', $user_email) ?>' />
                        <?= form_error('user_email', '<span style="display:block;color:red;">', '</span>') ?>
                    </td>
                </tr>
                <tr>
                    <th valign="top">Phone

                    </th>
                    <td>
                        <input type="text" name='user_phone' value='<?= set_value('user_phone', $user_phone) ?>' />
                        <?= form_error('user_phone', '<span style="display:block;color:red;">', '</span>') ?>
                    </td>
                </tr>
                <tr>
                    <th valign="top">Country </th>
                    <td>
                        <select class="select-style2 gender2 jcountry jload_area2" name="country_id"><?= common::get_country_options($_REQUEST['country_id']) ?></select>
                        <div class="clear"></div>
                        <span> <?= form_error('country_id', '<span style="display:block;color:red;">', '</span>') ?>
                    </td>

                </tr>
                <tr>
                    <th valign="top">Area </th>
                    <td>
                        <select class="select-style2 gender2 jarea" id="j_area_data2" name="area_id"><?= common::get_area($_REQUEST['area_id']) ?></select>
                        <div class="clear"></div>
                        <?= form_error('area_id', '<span style="display:block;color:red;">', '</span>') ?>
                    </td>
                </tr>
            </table>
            <div class="clear"></div>
         

                <input type="hidden" name="sess_value" value="<?= $user_id ?>" />
                <!--<input class="button" type='submit' name='save' value='Save'/>-->
                
                
                <input class="yellowButton login_submit_button" style="margin-right: 30px;" type='submit' name='save' value='Save'/>
  
                
                <div class="clear"></div>
                <br/><br/>
            <div class="spacer"></div>
        </form>
    </div>
</div>