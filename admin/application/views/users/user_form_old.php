<div class='form_content' style="width:750px;">
    <div class="ui-jqdialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix form_title">
        <span class="ui-jqdialog-title"><?= $page_title ?></span>
    </div>
    <form action='<?= site_url($action); ?>' method='post'>
        <table cellpadding=0 cellspacing=1>            
            <tbody>
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
                    <th>First Name </th>
                    <td><input type='text' name='user_first_name' value='<?= set_value('user_first_name', $user_first_name) ?>' class='text ui-widget-content ui-corner-all width_160' /><?= form_error('user_first_name', '<span>', '</span>') ?></td>
                </tr>
                <tr>
                    <th>Last Name </th>
                    <td><input type='text' name='user_last_name' value='<?= set_value('user_last_name', $user_last_name) ?>' class='text ui-widget-content ui-corner-all width_160' /><?= form_error('user_last_name', '<span>', '</span>') ?></td>
                </tr>                
                <tr>
                    <th>User Email </th>
                    <td><input type='text' name='user_email' value='<?= set_value('user_email', $user_email) ?>' class='text ui-widget-content ui-corner-all width_160' /><?= form_error('user_email', '<span>', '</span>') ?></td>
                </tr>
                <tr>
                    <th>User Phone </th>
                    <td><input type='text' name='user_phone' value='<?= set_value('user_phone', $user_phone) ?>' class='text ui-widget-content ui-corner-all width_160' /><?= form_error('user_phone', '<span>', '</span>') ?></td>
                </tr>
                <tr><th>&nbsp;</th>
                    <td>
                        <input type="hidden" name="sess_value" value="<?= $user_id ?>" />
                        <input type='submit' name='save' value='Save' class="button" /> 
                        <input type='button' value='cancel' class="cancel"/>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>