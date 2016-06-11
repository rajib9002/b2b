<div class="search_by_r">
    <p>Change Your Password</p>
</div>
<div class="clear"></div>
<div class="content">
      <div style="background-color:#fff;width:100%;">
    <div  style="width:300px;margin:0 auto;">
        <form id="form" name="form" action='<?= site_url('account/account_password') ?>' method='post'>
            <?php if($msg!='') {
                echo "<div class='error'>".$msg."</div>";
            }
            ?>
            <table class="rajib_table_content">
                <tr><th valign="top">Old Password</th>
                    <td>
                        <input type="password" name="old_password" id="old_password" />
                        <?=form_error('old_password','<span style="display:block;color:red;">','</span>')?>
                    </td>
                </tr>
                <tr><th valign="top">New Password</th>
                    <td>
                        <input type="password" name="user_password" id="password" />
                        <?=form_error('user_password','<span style="display:block;color:red;">','</span>')?>
                    </td>
                </tr>
                <tr><th valign="top">Confirm Password</th>
                    <td>
                        <input type="password" name="confirm_password" id="password" />
                        <?=form_error('confirm_password','<span style="display:block;color:red;">','</span>')?>
                    </td>
                </tr>
                <tr>
                    <th> <input class="button" type='submit' name='change_password' value='Change Password'/></th>
<!--                    <td><a href="<?=site_url('login/forgot_password')?>">Forgot your Password?</a></td>
-->
</tr>
            </table>
        </form>
    </div>
          </div>
</div>

