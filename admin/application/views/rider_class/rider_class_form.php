<div class='form_content' style="width:750px;">
    <div class="ui-jqdialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix form_title">
        <span class="ui-jqdialog-title"><?= $page_title ?></span>
    </div>
    <form id="valid_rider_class" action='<?= site_url($action); ?>' method='post' enctype="multipart/form-data">
        <table cellpadding=0 cellspacing=1>
            <tbody>               
                <tr>
                    <th>Class Name <span class='req_mark'>*</span></th>
                    <td><input type='text' name='rider_class_name' value='<?= set_value('rider_class_name', $rider_class_name) ?>' class='text ui-widget-content ui-corner-all width_160' /><?= form_error('rider_class_name', '<span>', '</span>') ?></td>
                </tr> 
                  
                <tr><th>&nbsp;</th>
                    <td>
                        <input type="hidden" name="sess_value" value="<?= $rider_class_id ?>" />
                        <input type='submit' name='save' value='Save' class="button" /> 
                        <input type='button' value='cancel' class="cancel" />
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>