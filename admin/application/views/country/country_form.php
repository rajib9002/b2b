<div class='form_content' style="width:750px;">
    <div class="ui-jqdialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix form_title">
        <span class="ui-jqdialog-title"><?= $page_title ?></span>
    </div>
    <form id="valid_country" action='<?= site_url($action); ?>' method='post' enctype="multipart/form-data">
        <table cellpadding=0 cellspacing=1>
            <tbody>               
                <tr>
                    <th>Country Name <span class='req_mark'>*</span></th>
                    <td><input type='text' name='country_name' value='<?= set_value('country_name', $country_name) ?>' class='text ui-widget-content ui-corner-all width_160' /><?= form_error('country_name', '<span>', '</span>') ?></td>
                </tr> 


  <tr>
                <th valign="top">Currency<span style="color: red;">*</span> :</th>
                <td>
                    <select name="currency"  class="select-style2" style="margin: 0 auto; padding: 0 auto;">
                        <option value="">Set Currency</option>
                        <option value="Euro" <?php if($currency=='Euro'){?> Selected="selected"<?php }?>>Euro</option>
                        <option value="GBP" <?php if($currency=='GBP'){?> Selected="selected"<?php }?> >GBP</option>
                    </select>
                    <div class="clear"></div>
                    <?= form_error('currency', '<span style="display:block;color:red;">', '</span>') ?>
                </td>
            </tr>

 <tr>
                    <th>Amount <span class='req_mark'>*</span></th>
                    <td><input type='text' name='amount' value='<?= set_value('amount', $amount) ?>' class='text ui-widget-content ui-corner-all width_160' /><?= form_error('amount', '<span>', '</span>') ?></td>
                </tr> 



                
                <tr>
                <th>Flag </th>
                <td>
                    <img src="<?= site_url(UPLOAD_PATH .'/'.'country/'.$image)?>" width="215" height="25" /><br />                    
                    <input type="hidden" name="h_image" value="<?=$image?>" />
                    <input type='file' name='image'  class="text ui-widget-content ui-corner-all required" class='required' /></td>
            </tr>
                  
                <tr><th>&nbsp;</th>
                    <td>
                        <input type="hidden" name="sess_value" value="<?= $country_id ?>" />
                        <input type='submit' name='save' value='Save' class="button" /> 
                        <input type='button' value='cancel' class="cancel" />
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>