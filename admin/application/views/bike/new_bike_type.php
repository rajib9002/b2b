<div class='form_content' style="width:750px;">
    <div class="ui-jqdialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix form_title">
        <span class="ui-jqdialog-title"><?= $page_title ?></span>
    </div>
    <form id="valid_country" action='<?= site_url($action); ?>' method='post' enctype="multipart/form-data">
        <table cellpadding=0 cellspacing=1>
            <tbody>   
                 <tr>
                    <th>Main Type <span class='req_mark'>*</span></th>
                    <td><select name="main_type_id" class="text ui-widget-content ui-corner-all required">
                            <option value=''>Select Main Type</option>
                            <?=$this->bike_model->get_main_type(set_value('main_type_id',$main_type_id))?>
                        </select><?=form_error('main_type_id','<span>','</span>')?>
                    </td>
                </tr>         
                
                <tr>
                    <th>Type Name <span class='req_mark'>*</span></th>
                    <td><input type='text' name='type_name' value='<?= set_value('type_name', $type_name) ?>' class='text ui-widget-content ui-corner-all width_160' /><?= form_error('type_name', '<span>', '</span>') ?></td>
                </tr>  
                
                <tr>
                <th>Type Image </th>
                <td>
                    <img src="<?= site_url(UPLOAD_PATH .'/'.'bike_type_image/'.$type_image)?>" width="215" height="25" /><br />                    
                    <input type="hidden" name="h_image" value="<?=$type_image?>" />
                    <input type='file' name='image'  class="text ui-widget-content ui-corner-all required" class='required' />[Note:Width X Height=1000 X 120]</td>
            </tr>
            
            <tr>
               <th>Description Type</th>
                <td>
                    <input type="radio" name="description_type" value="1" <? if($description_type==1) echo 'checked'?> /><b>Yes</b>
                    <input type="radio" name="description_type" value="0" <? if($description_type==0) echo 'checked'?>/><b>NO</b><br>
                </td>
            </tr>
                  
                <tr><th>&nbsp;</th>
                    <td>
                        <input type="hidden" name="sess_value" value="<?= $type_id ?>" />
                        <input type='submit' name='save' value='Save' class="button" /> 
                        <input type='button' value='cancel' class="cancel" />
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>


