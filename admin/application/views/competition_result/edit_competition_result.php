<div class="form_content" style="width:900px">
    <form id="valid_competition_result" method='post' action='<?= site_url($action); ?>' enctype="multipart/form-data">
        <table>
            <tr>
                <th>Competition Name<span class='req_mark'>*</span></th>
                <td><select class='jload_compResult' name="competitionr_id" ><?= common::get_competitionr_options($competition_id) ?></select>
                    <?= form_error('competitionr_id', '<span>', '</span>') ?>
                </td>  
            </tr> 
            
            
            
             <tr>
                    <th>Year<span class='req_mark'>*</span></th>
                    <td>
                        <select class="select-style2" name="year" id="jcompYear" style="min-width: 150px">
                            <option value="">Select Year</option>                                   
                            <?php for ($y = 2010; $y <= 2030; $y++) { ?>
                                <option value="<?= $y ?>" <?php if ($y== $year || $y==$_REQUEST['year'])
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
                <td><select class="select-style2 competitionr_details_id" style="min-width: 150px" id="jcompRound" name="competitionr_details_id"><?= common::get_round_options($round_id) ?></select>
                    <?= form_error('competitionr_details_id', '<span>', '</span>') ?>
                </td>  
            </tr> 


            <tr>
                <th>Class Name<span class='req_mark'>*</span></th>
                <td><select class="select-style2 jclass_id" name="class_id" style="min-width: 150px" id="jcompClass"><?= common::get_class_options($class_id) ?></select>
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
        <table>
        <?php $inc = 0;
        foreach ($competitor as $c) { ?>
            <tr>
<!--                <td>&nbsp;</td>-->
                <td><input type="text" class="text ui-widget-content ui-corner-all width_60"  name="position[]" value="<?= $c['position'] ?>"/><input type="hidden" name="pro_serial[]" value=""/></td>
                <td><input type="text" class="text ui-widget-content ui-corner-all width_60" name="start[]" value="<?= $c['start'] ?>" /></td>
                <td><input type="text" class="text ui-widget-content ui-corner-all width_150" name="competitor[]" value="<?= $c['competitor'] ?>"/></td>
                <td><input type="text" class="text ui-widget-content ui-corner-all width_60" name="r1_score[]" value="<?= $c['r1_score'] ?>" id="jr1_score_<?= $inc ?>" onkeyup="common.getTotal_data(<?= $inc ?>)"/></td>
                <td><input type="text" class="text ui-widget-content ui-corner-all width_60" name="r2_score[]" value="<?= $c['r2_score'] ?>" id="jr2_score_<?= $inc ?>" onkeyup="common.getTotal_data(<?= $inc ?>)" /></td>
                <td><input type="text" class="text ui-widget-content ui-corner-all width_60" name="r3_score[]" value="<?= $c['r3_score'] ?>" id="jr3_score_<?= $inc ?>" onkeyup="common.getTotal_data(<?= $inc ?>)"/></td>
                <td><input type="text" class="text ui-widget-content ui-corner-all width_60" name="r4_score[]" value="<?= $c['r4_score'] ?>" id="jr4_score_<?= $inc ?>" onkeyup="common.getTotal_data(<?= $inc ?>)"/></td>
                <td><input type="text" class="text ui-widget-content ui-corner-all width_60" name="r5_score[]" value="<?= $c['r5_score'] ?>" id="jr5_score_<?= $inc ?>" onkeyup="common.getTotal_data(<?= $inc ?>)"/></td>
                <td><input type="text" class="text ui-widget-content ui-corner-all width_60" name="r6_score[]" value="<?= $c['r6_score'] ?>" id="jr6_score_<?= $inc ?>" onkeyup="common.getTotal_data(<?= $inc ?>)"/></td>
                <td><input type="text" class="text ui-widget-content ui-corner-all width_60" name="r7_score[]" value="<?= $c['r7_score'] ?>" id="jr7_score_<?= $inc ?>" onkeyup="common.getTotal_data(<?= $inc ?>)"/></td>
                <td><input type="text" class="text ui-widget-content ui-corner-all width_60" name="total[]" id="total_<?= $inc ?>" value="<?= $c['total'] ?>" /></td>
            </tr>
            <?php $inc++;
        } ?>
       
        </table>

        <table>
            <tr><th>&nbsp;</th><td><input type='submit' name='save' value='Save' class='button' /> <input type='button' value='Cancel' onclick='window.history.back();' /></tr>
        </table>





    </form>

</div>