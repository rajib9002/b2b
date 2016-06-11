<div class='form_content' style="width:750px;">
    <div class="ui-jqdialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix form_title">
        <span class="ui-jqdialog-title"><?= $page_title ?></span>
    </div>
    <form id="valid_country" action='<?= site_url($action); ?>' method='post' enctype="multipart/form-data">
        <table cellpadding=0 cellspacing=1>
            <tbody>  

                <tr>
                    <th>Make Name <span class='req_mark'>*</span></th>
                    <td><select name="make_id"  class='text ui-widget-content ui-corner-all width_160' id="j_make_data2"><?= $this->bike_model->get_make_options(set_value('make_id', $make_id)) ?></select><?= form_error('make_id', '<span>', '</span>') ?></td>
                </tr>

                <tr>
                    <th>Main Type Name <span class='req_mark'>*</span></th>
                    <td><select name="main_type_id" class="text ui-widget-content ui-corner-all width_160 jmain_type" >
                            <option value=''>Select Main Type</option>
                            <?= $this->bike_model->get_main_type(set_value('main_type_id', $main_type_id)) ?>
                        </select><?= form_error('main_type_id', '<span>', '</span>') ?>
                    </td>
                </tr> 
                <tr>
                    <th>Type Name <span class='req_mark'>*</span></th>

                    <td><select name="type_id"  class='text ui-widget-content ui-corner-all width_160' id="jtype_name">
                           <?= $this->bike_model->get_type_options_ajax(set_value('main_type_id', $main_type_id),set_value('type_id', $type_id)) ?>
                        </select><?= form_error('type_id', '<span>', '</span>') ?>
                    </td>
                </tr> 

                <tr>
                    <th>Model Name <span class='req_mark'>*</span></th>
                    <td><input type='text' name='model_name' value='<?= set_value('model_name', $model_name) ?>' class='text ui-widget-content ui-corner-all width_160' /><?= form_error('model_name', '<span>', '</span>') ?></td>
                </tr> 

                <tr><th>&nbsp;</th>
                    <td>
                        <input type="hidden" name="sess_value" value="<?= $model_id ?>" />
                        <input type='submit' name='save' value='Save' class="button" /> 
                        <input type='button' value='cancel' class="cancel" />
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>