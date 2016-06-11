<div class="form_content">
    <div class="ui-jqdialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix form_title">
        <span class="ui-jqdialog-title"><?=$page_title?></span>
    </div>
    <?php if($msg!=''){echo "<div class='message success'>".$msg."</div>";}?>
    <form id="valid_form" action="<?=site_url('settings/change_password')?>" method="post">
        <table>
            <tr>
                <th>Old Password <span class='req_mark'>*</span></th>
                <td><input type='password' name='old_password' value='' class="text ui-widget-content ui-corner-all required width_200" /><?=form_error('old_password','<span>','</span>')?></td>
            </tr>
            <tr>
                <th>New Password <span class='req_mark'>*</span></th>
                <td><input type='password' name='new_password' value='' class="text ui-widget-content ui-corner-all required width_200" /><?=form_error('new_password','<span>','</span>')?></td>
            </tr>
            <tr>
                <th>Confirm Password <span class='req_mark'>*</span></th>
                <td><input type='password' name='confirm_password' value='' class="text ui-widget-content ui-corner-all required width_200" /><?=form_error('confirm_password','<span>','</span>')?></td>
            </tr>
            <tr>
                <th>&nbsp;</th>
                <td>
                    <input type='submit' name='change_password' value='Change Password' class='button' />
                    <input type='button' name='cancel' value='Cancel' class='cancel' />
                </td>
            </tr>
        </table>
    </form>
</div>