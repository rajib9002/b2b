<? $inc = 0 ?>
<script type="text/javascript">
    var inc=1;
    function add_more_products(){
        var new_products="<tr>"+
            "<th>&nbsp;</th><td><select class='select-style2' name='competitionr_id[]'>"+'<?php echo common::get_competitionr_options()?>'+"</select><input type='hidden' name='pro_serial[]' value='' id='pr_serial_"+inc+"'/></td>"+
            "</tr>";
        $j('#product').append(new_products);
        inc++;
        return false;
    }
</script>





<div class='form_content' style="width:750px;">
    <div class="ui-jqdialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix form_title">
        <span class="ui-jqdialog-title"><?= $page_title ?></span>
    </div>
    <form id="valid_rider" action='<?= site_url($action); ?>' method='post' enctype="multipart/form-data">
        <table cellpadding=0 cellspacing=1>
            <tbody>               

                <tr>
                    <th>Rider Number <span class='req_mark'>*</span></th>
                    <td><input type='text' name='rider_number' value='<?= set_value('rider_number', $rider_number) ?>' class='text ui-widget-content ui-corner-all width_160' /><?= form_error('rider_number', '<span>', '</span>') ?></td>
                </tr>
                <tr>
                    <th>Rider First Name <span class='req_mark'>*</span></th>
                    <td><input type='text' name='rider_first_name' value='<?= set_value('rider_first_name', $rider_first_name) ?>' class='text ui-widget-content ui-corner-all width_160' /><?= form_error('rider_first_name', '<span>', '</span>') ?></td>
                </tr>
                <tr>
                    <th>Rider Last Name <span class='req_mark'>*</span></th>
                    <td><input type='text' name='rider_last_name' value='<?= set_value('rider_last_name', $rider_last_name) ?>' class='text ui-widget-content ui-corner-all width_160' /><?= form_error('rider_last_name', '<span>', '</span>') ?></td>
                </tr>
                
                <?php if($rider_number!=''){?>
                    <?php $com=sql::rows('rider',"rider_number='$rider_number'");?>
                    <?php $inc=0; foreach($com as $c){?>
                
                <tr>
                    <th>Competition Name <?=$inc+1;?><span class='req_mark'>*</span></th>
                    <td><input type='hidden' name='pro_serial[]' value='' id='pr_serial_<?=$inc?>'/>
                        <select class="select-style2" class="competition_<?=$inc?>" name="competitionr_id[]"><?= common::get_competitionr_options($c[competitionr_id]) ?></select>
                    </td> 
                    
                </tr>
                
                <?php $inc++; }?>
                    
                    
                    <?php }else{?>
                
                <tr>
                    <th>Competition Name<span class='req_mark'>*</span></th>
                    <td><input type='hidden' name='pro_serial[]' value='' id='pr_serial_<?=$inc?>'/>
                        <select class="select-style2" class="competition_<?=$inc?>" name="competitionr_id[]"><?= common::get_competitionr_options($competitionr_id) ?></select>
                        <?= form_error('competitionr_id', '<span>', '</span>') ?>
                    </td> 
                    <td>
                        <a href="javascript:void(0)" style="color:#0072bc;font-weight: bold;" onclick="return add_more_products()"><b>Add Multiple Competition</b></a><br />
                    </td>
                </tr>
                
                
                <?php }?>
                
                </table>
            <table cellpadding=0 cellspacing=1 id="product">

            </table>
               <table cellpadding=0 cellspacing=1>
            <tr>
                <th>Country<span class='req_mark'>*</span></th>
                <td><select class="select-style2" name="country_id"><?= common::get_country_options($country_id) ?></select>
                    <?= form_error('country_id', '<span>', '</span>') ?>
                </td>  
            </tr> 
            <tr>
                <th>Class Name<span class='req_mark'>*</span></th>
                <td><select class="select-style2" name="class_id"><?= common::get_class_options($class_id) ?></select>
                    <?= form_error('class_id', '<span>', '</span>') ?>
                </td>  
            </tr> 
            <tr><th>&nbsp;</th>
                <td>
                    <input type="hidden" name="sess_value" value="<?= $rider_id ?>" />
                    <input type='submit' name='save' value='Save' class="button" /> 
                    <input type='button' value='cancel' class="cancel" />
                </td>
            </tr>
            </tbody>
        </table>
    </form>
</div>