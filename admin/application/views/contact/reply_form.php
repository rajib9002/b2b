<div class="form_content">
    <div class="ui-jqdialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix form_title">
        <span class="ui-jqdialog-title"><?= $page_title ?></span>
    </div>
    <form id=""  action="<?= site_url("contact/reply/".$contact_id) ?>" method="post">
        
        <table>
            <tr>
                <th> Name</th>
                <td><input type='text' name='contact_name' value='<?= set_value('contact_name',$contact_name) ?>' class='text ui-widget-content ui-corner-all width_200 readonly' readonly/><?= form_error('contact_name', '<span>', '</span>') ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><input type='text' name='contact_email' value='<?= set_value('contact_email',$contact_email) ?>' class='text ui-widget-content ui-corner-all width_200 readonly' readonly/><?= form_error('contact_email', '<span>', '</span>') ?></td>
            </tr>
            <tr>
                <th>Subject <span class='req_mark'>*</span></th>
                <td><input type='text' name='contact_subject' value='<?= set_value('contact_subject',$contact_subject) ?>' class='text ui-widget-content ui-corner-all width_200' /><?= form_error('contact_subject', '<span>', '</span>') ?></td>
            </tr>
            <tr>
                <th>Message <span class='req_mark'>*</span></th>
                <td><textarea name='contact_message'   class='text ui-widget-content ui-corner-all' cols="50" rows="6"></textarea><?= form_error('contact_message', '<span>', '</span>') ?></td>
            </tr>
           
            <tr><th>&nbsp;</th><td><input type='submit' name='save' value='Save' class='button' /> <input type='button' name='cancel' value='Cancel' class='cancel' /></td>
            </tr>
        </table>
    </form>
</div>