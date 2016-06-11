<div class="form_content" style="width:900px">
    <form id="valid_competition" method='post' action='<?= site_url($action); ?>' enctype="multipart/form-data">
        <table>
            
            <tr>
                <th>Country<span class='req_mark'>*</span></th>
                <td><select class="select-style2" name="country_id"><?= common::get_country_options($_REQUEST[country_id]) ?></select>
                <?= form_error('country_id', '<span>', '</span>') ?>
                
                </td>  
            </tr> 
            
            <tr>
                <th>competition Title<span class='req_mark'>*</span></th>
                <td><input type='text' name='competition_title' value='<?= set_value('competition_title') ?>' class='text ui-widget-content ui-corner-all width_200 required' /> <?= form_error('competition_title', '<span>', '</span>') ?></td>
            </tr>
            <tr>
                <th>competition Club<span class='req_mark'>*</span></th>
                <td><input type='text' name='competition_club' value='<?= set_value('competition_club') ?>' class='text ui-widget-content ui-corner-all width_200 required' /> <?= form_error('competition_club', '<span>', '</span>') ?></td>
            </tr>
            <tr>
                <th>competition Venue<span class='req_mark'>*</span></th>
                <td><input type='text' name='competition_venue' value='<?= set_value('competition_venue') ?>' class='text ui-widget-content ui-corner-all width_200 required' /> <?= form_error('competition_venue', '<span>', '</span>') ?></td>
            </tr>
            <tr>
                <th>competition Description<span class='req_mark'>*</span></th>
                <td><textarea name="competition_des" rows="4" cols="30" id="content" class="content text ui-widget-content ui-corner-all"><?= set_value('competition_des', $product_data['competition_des']) ?></textarea><?= form_error('competition_des', '<span>', '</span>') ?></td>
            </tr>
            <tr>
                <th>competition Date<span class='req_mark'>*</span></th>
                <td><input type='text' name='competition_date' value='<?= set_value('competition_date') ?>' class='text ui-widget-content ui-corner-all width_200 required date_picker' /> <?= form_error('competition_date', '<span>', '</span>') ?></td>
            </tr>
            <tr>
                <th>competition Image<span class='req_mark'>*</span></th>
              
                <td><input type='file' name='image'/></td>
            </tr>
            <tr><th>&nbsp;</th><td><input type='submit' name='save' value='Save' class='button' /> <input type='button' value='Cancel' onclick='window.history.back();' class="cancel" /></tr>
        </table>
    </form>

</div>