<div class="form_content">
    <div class="ui-jqdialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix form_title">
        <span class="ui-jqdialog-title"><?=$page_title?></span>
    </div>
     <?php if($msg!=''){echo "<div class='message success'>".$msg."</div>";}?>
    <form id="valid_system" action='<?=site_url('settings')?>' method='post'>
        <table>
             <tr>
                <th>Admin Email <span class='req_mark'>*</span></th>
                <td><input type='text' name='admin_email' value='<?=$admin_email?>' class='text ui-widget-content ui-corner-all width_160' /></td>
            </tr>
             <tr>
                <th>Notify Email <span class='req_mark'>*</span></th>
                <td><input type='text' name='notify_email' value='<?=$notify_email?>' class='text ui-widget-content ui-corner-all width_160' /></td>
            </tr>
           
            <tr>
                <th>&nbsp;</th><td><input type='submit' name='update' value='Update Settings' class='button' /> <input type='button' name='cancel' value='Cancel' class='cancel' /></td>
            </tr>
        </table>
    </form>
</div>
<div class="clear"></div>