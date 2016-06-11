<div class='form_content' style="width:750px;">
    <div class="ui-jqdialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix form_title">
        <span class="ui-jqdialog-title"><?= $page_title ?></span>
    </div>
    <form id="valid_competitionr" action='<?= site_url($action); ?>' method='post' enctype="multipart/form-data">
        <table cellpadding=0 cellspacing=1>
            <tbody>  
                
                <tr>
                    <th>Competition Name <span class='req_mark'>*</span></th>
                    <td><input type='text' name='competitionr_name' style="width:320px" value='<?= set_value('competitionr_name', $competitionr_name) ?>' class='text ui-widget-content ui-corner-all width_160' /><?= form_error('competitionr_name', '<span>', '</span>') ?></td>
                </tr>
                <tr>
                    <th>Category Name</th>
                    <td><select name="category_id">
                            <option value="">Select Category</option>
                            <option value="1" <?php if($_REQUEST['category_id']==1 || $category_id==1){?>selected='selected'<?php }?>>Amateur</option>
                            <option value="2" <?php if($_REQUEST['category_id']==2 || $category_id==2){?>selected='selected'<?php }?>>Professional</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Discipline</th>
                    <td>
                        <select name="discipline_id">  
                            <?php echo common::get_discipline(set_value('discipline_id', $discipline_id))?>
                        </select>
                    </td>
                </tr>
                
                              
                
                 <tr>
                    <th>Country Name <span class='req_mark'>*</span></th>
                    <td><select name="country_id"  class='jload_host' style="min-width: 200px;"><?= common::get_country_options(set_value('country_id', $competitionr_country)) ?></select>
                    <?= form_error('country_id', '<span>', '</span>') ?></td>
                </tr>
                
                
                <tr>
                    <th>Host Body <span class='req_mark'>*</span></th>
                    <td><select class="select-style2" name="competitionr_host_club" id="j_host_data"  style="min-width: 200px;"><?= common::get_host_body_options($competitionr_country,$competitionr_host_club) ?></select>
                        <?= form_error('competitionr_host_club', '<span>', '</span>') ?>

                    </td>  
                </tr>
                
               
                
<!--                <tr>
                    <th>competition Date<span class='req_mark'>*</span></th>
                    <td><input type='text' name='competitionr_date' value='<?= set_value('competitionr_date',$competitionr_date) ?>' class='text ui-widget-content ui-corner-all width_200 required date_picker' /></td>
                </tr>-->
                
<!--                <tr>
                    <th>Year<span class='req_mark'>*</span></th>
                    <td>
                        <select class="select-style2" name="competitionr_year">
                                   <option value="">Select Year</option>
                                   
                                   <?php
                                    for($y=2010;$y<=2050; $y++){ ?>
                                         <option value="<?=$y?>" <?php if($year==$y) echo 'selected'?>><?=$y?></option>
                                        <?php } 
                                   ?>
                        </select>
                        <?= form_error('competitionr_year', '<span>', '</span>') ?>

                    </td>  
                </tr>-->
                

                <tr><th>&nbsp;</th>
                    <td>
                        <input type="hidden" name="sess_value" value="<?= $competitionr_id ?>" />
                        <input type='submit' name='save' value='Save' class="button" /> 
                        <input type='button' value='cancel' class="cancel" />
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>