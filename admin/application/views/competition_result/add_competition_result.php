<div class="form_content" style="width:900px">
    <form id="valid_competition_result" method='post' action='<?= site_url($action); ?>' enctype="multipart/form-data">
        <table>
            <tr>
                <th>Competition Name<span class='req_mark'>*</span></th>
                <td>
                    <select class='jload_compResult' name="competitionr_id"><?= common::get_competitionr_options($competitionr_id) ?></select>
                    <?= form_error('competitionr_id', '<span>', '</span>') ?>
                </td>  
            </tr>
            
               <tr>
                    <th>Year<span class='req_mark'>*</span></th>
                    <td>
                        <select class="select-style2" name="year" id="jcompYear" style="min-width: 150px">
                            <option value="">Select Year</option>                                   
                            <?php for ($y = 2010; $y <= 2030; $y++) { ?>
                                <option value="<?= $y ?>" <?php if ($year == $y || $_REQUEST['year']==$y)
                                echo 'selected' ?>><?= $y ?></option>
                            <?php }
                            ?>
                        </select>
                        </select>
                        <?= form_error('year', '<span>', '</span>') ?>

                    </td> 
                    </tr>
            
            
            <tr>
                <th>Round<span class='req_mark'>*</span></th>
                <td><select class="competitionr_details_id" style="min-width: 150px" id="jcompRound" name="competitionr_details_id"><?= common::get_round_options($competitionr_details_id) ?></select>
                    <?= form_error('competitionr_details_id', '<span>', '</span>') ?>
                </td>  
            </tr> 
            <tr>
                <th>Class Name<span class='req_mark'>*</span></th>
                <td><select class="jclass_id" name="class_id" style="min-width: 150px" id="jcompClass"><?= common::get_class_options($class_id) ?></select>
                    <?= form_error('class_id', '<span>', '</span>') ?>
                </td>  
            </tr> 
        </table>
        <table>
            <tr>
                <td align="center">Excel File(.xls format):</td><td><input type="file" name="file" id="file"></td></tr>
            <tr >
            </tr>
        </table>   
        <table>
            <tr><th>&nbsp;</th><td><input type='submit' name='save' value='Save' class='button' /> <input type='button' value='Cancel' onclick='window.history.back();'/></tr>
        </table>
    </form>
</div>