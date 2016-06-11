<div class="search_by_r">
    <p>Login</p>
</div>
<div class="clear"></div>
<div class="content">
    <form id="form" name="form" action='<?=site_url('login')?>' method='post'>
        <?php if($msg!='') {
            echo'<p style="border-bottom:1px solid gray;color:#fc2c1e;font-size: 20px;font-family: arial;text-align: left;font-weight: bold;padding:14px;">
'. $msg.'</p>';
        }

        ?>

        <table class="rajib_table_content" style="width:100%;">
            <tr><th>&nbsp;</th><td>&nbsp;</td></tr>

            <tr><th valign="top">User Name</th>
                <td> <input type="text" name="user_name" id="name" />
                    <?='<br/>'.form_error('user_name','<span style="display:block;color:red;">','</span>')?></td>
            </tr>


            <tr><th valign="top">Password</th>
                <td><input type="password" name="user_password" id="password" />
                    <?='<br/>'.form_error('user_password','<span style="display:block;color:red;">','</span>')?></td>
            </tr>
            <tr><th>&nbsp;</th><td>&nbsp;</td></tr>
            <tr>
                <th><input class="button" type='submit' name='login' value='Login'/> </th>
                <td><a style="color:blue" href="<?=site_url('login/forgot_password')?>">Forgot your Password?</a></td>
            </tr>


        </table>
    </form>
</div>
