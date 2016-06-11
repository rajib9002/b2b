<div class='form_content' style="width:750px;">
    <div class="ui-jqdialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix form_title">
        <span class="ui-jqdialog-title"><?= $page_title ?></span>
    </div>
    <form id="valid_club" action='<?= site_url($action); ?>' method='post' enctype="multipart/form-data">
        <table cellpadding=0 cellspacing=1>
            <tbody>
                
                 <tr>
                    <th>Country Name <span class='req_mark'>*</span></th>
                    <td><select name="country_id"  class='text ui-widget-content ui-corner-all width_160'><?= common::get_country_options(set_value('country_id', $country_id)) ?></select>
                    <?= form_error('country_id', '<span>', '</span>') ?></td>
                </tr>
                
                <tr>
                    <th>Host Club Name <span class='req_mark'>*</span></th>
                    <td><input type='text' name='club_name' value='<?= set_value('club_name', $club_name) ?>' class='text ui-widget-content ui-corner-all width_160' /><?= form_error('club_name', '<span>', '</span>') ?></td>
                </tr>   

                <tr>
                    <th>Club Short Name</th>
                    <td><input type='text' name='club_short_name' value='<?= set_value('club_short_name', $club_short_name) ?>' class='text ui-widget-content ui-corner-all width_160' /></td>
                </tr>               
                  
                <tr><th>&nbsp;</th>
                    <td>
                        <input type="hidden" name="sess_value" value="<?= $club_id ?>" />
                        <input type='submit' name='save' value='Save' class="button" /> 
                        <input type='button' value='cancel' class="cancel" />
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>