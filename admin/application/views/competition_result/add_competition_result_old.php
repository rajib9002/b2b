<div class="form_content" style="width:900px">
    <form id="valid_competition_result" method='post' action='<?= site_url($action); ?>' enctype="multipart/form-data">
        <table>
            <tr>
                <th>Competition Name<span class='req_mark'>*</span></th>
                <td><select class="select-style2 competitionr_id" name="competitionr_id"><?= common::get_competitionr_options($competitionr_id) ?></select>
                    <?= form_error('competitionr_id', '<span>', '</span>') ?>
                </td>  
            </tr> 

            <tr>
                <th>Round<span class='req_mark'>*</span></th>
                <td><select class="select-style2 competitionr_details_id" name="competitionr_details_id"><?= common::get_round_options($competitionr_details_id) ?></select>
                    <?= form_error('competitionr_details_id', '<span>', '</span>') ?>
                </td>  
            </tr> 


            <tr>
                <th>Class Name<span class='req_mark'>*</span></th>
                <td><select class="select-style2 jclass_id" name="class_id"><?= common::get_class_options($class_id) ?></select>
                    <?= form_error('class_id', '<span>', '</span>') ?>
                </td>  
            </tr> 

        </table>

        <table width="100%" border="0" >
                <tr>
                    <td>Position </td>
                    <td>Start No</td>
                    <td style="width:150px">Rider</td>
                    <td>Race 1 </td>
                    <td>Race 2 </td>
                    <td>Race 3</td>
                    <td>Race 4 </td>
                    <td>Race 5 </td>
                    <td>Race 6</td>
                    <td>Race 7</td>
                    <td>Total</td>
                </tr>
        </table>
        <table class="jall_data">
            
        
        
        </table>
        <table>
            <tr><th>&nbsp;</th><td><input type='submit' name='save' value='Save' class='button' /> <input type='button' value='Cancel' onclick='window.history.back();' class="cancel" /></tr>
        </table>
    </form>
<!--            <td><input type='text' class="text ui-widget-content ui-corner-all width_80   position_<?= $inc ?> "  name='position[]' value="<?= $_REQUEST['position'][$inc] ?>"/>
                <input type="hidden" name="pro_serial[]" value="" id="pr_serial_<?= $inc ?>"/>
            </td>                <tr>
    <td><input type='text' class="text ui-widget-content ui-corner-all width_80   position_<?= $inc ?> "  name='position[]' value="<?= $_REQUEST['position'][$inc] ?>"/>
        <input type="hidden" name="pro_serial[]" value="" id="pr_serial_<?= $inc ?>"/>
    </td>
    <td><input type='text' class="text ui-widget-content ui-corner-all width_80  start_<?= $inc ?> " name='start[]' value="<?= $_REQUEST['start'][$inc] ?>" /></td>
    <td><input type='text' class="text ui-widget-content ui-corner-all width_80  competitor_<?= $inc ?> " name='competitor[]' value="<?= $_REQUEST['competitor'][$inc] ?>" /></td>
    <td><input type='text' class="text ui-widget-content ui-corner-all width_80  r1_score_<?= $inc ?> " name='r1_score[]' value="<?= $_REQUEST['r1_score'][$inc] ?>" /></td>
    <td><input type='text' class="text ui-widget-content ui-corner-all width_80  r2_score_<?= $inc ?>"name='r2_score[]' value="<?= $_REQUEST['r2_score'][$inc] ?>" /></td>
    <td><input type='text' class="text ui-widget-content ui-corner-all width_80  r3_score_<?= $inc ?>"name='r3_score[]' value="<?= $_REQUEST['r3_score'][$inc] ?>" /></td>
    <td><input type='text' class="text ui-widget-content ui-corner-all width_80  total_<?= $inc ?>"name='total[]' value="<?= $_REQUEST['total'][$inc] ?>" /></td>

</tr>-->
</div>