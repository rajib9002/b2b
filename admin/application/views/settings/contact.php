<div class="form_content">
    <div class="ui-jqdialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix form_title">
        <span class="ui-jqdialog-title"><?= $page_title ?></span>
    </div>
    <?php if ($msg != '') {
        echo "<div class='success'>" . $msg . "</div>";
    } ?>
    <form id="valid_contact" action='<?= site_url('settings/contact') ?>' method='post'>
        <table>
            <tr>
                <th>Company Name</th>
                <td><input type='text' name='company_name' value='<?= $company_name ?>' class='text ui-widget-content ui-corner-all width_200' /></td>
            </tr>
            <tr>
                <th>Company Address</th>
                <td><textarea name='company_address' rows="5" cols="40" class="text ui-widget-content ui-corner-all"><?= $company_address ?></textarea></td>
            </tr>
            <tr>
                <th>Telephone</th>
                <td><input type='text' name='company_phone' value='<?= $company_phone ?>' class='text ui-widget-content ui-corner-all width_200' /></td>
            </tr>
            <tr>
                <th>Fax</th>
                <td><input type='text' name='company_fax' value='<?= $company_fax ?>' class='text ui-widget-content ui-corner-all width_200' /></td>
            </tr>
            <tr>
                <th>Others</th>
                <td><input type='text' name='company_others' value='<?= $company_others ?>' class='text ui-widget-content ui-corner-all width_200' /></td>
            </tr>
            <tr>
                <th>Web</th>
                <td><input type='text' name='company_web' value='<?= $company_web ?>' class='text ui-widget-content ui-corner-all width_200' /></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><input type='text' name='company_email' value='<?= $company_email ?>' class='text ui-widget-content ui-corner-all width_200' /></td>
            </tr>
            <tr>
                <th>&nbsp;</th><td><input type='submit' name='update' value='Update Settings' class='button' /> <input type='button' name='cancel' value='Cancel' class='cancel' /></td>
            </tr>
        </table>
    </form>
</div>
<div class="clear"></div>