<div class='form_content' style="width:750px;">
    <div class="ui-jqdialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix form_title">
        <span class="ui-jqdialog-title"><?= $page_title ?></span>
    </div>
    <form id="valid_host_body" action='<?= site_url($action); ?>' method='post' enctype="multipart/form-data">
        <table cellpadding=0 cellspacing=1>
            <tbody>
                
                 <tr>
                    <th>Country Name <span class='req_mark'>*</span></th>
                    <td><select name="country_id"  class='text ui-widget-content ui-corner-all width_160'><?= common::get_country_options(set_value('country_id', $country_id)) ?></select>
                    <?= form_error('country_id', '<span>', '</span>') ?></td>
                </tr>
                
                <tr>
                    <th>Host Body Name <span class='req_mark'>*</span></th>
                    <td><input type='text' name='host_body_name' value='<?= set_value('host_body_name', $host_body_name) ?>' class='text ui-widget-content ui-corner-all width_160' /><?= form_error('host_body_name', '<span>', '</span>') ?></td>
                </tr>                 
                  
                <tr><th>&nbsp;</th>
                    <td>
                        <input type="hidden" name="sess_value" value="<?= $host_body_id ?>" />
                        <input type='submit' name='save' value='Save' class="button" /> 
                        <input type='button' value='cancel' class="cancel" />
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>