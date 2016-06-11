<div class='form_content' style="width:750px;">
    <div class="ui-jqdialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix form_title">
        <span class="ui-jqdialog-title"><?= $page_title ?></span>
    </div>
    <form id="valid_competitionr_details" action='<?= site_url($action); ?>' method='post' enctype="multipart/form-data">
        <table cellpadding=0 cellspacing=1>
            <tbody> 

                <tr>
                    <th>Country Name <span class='req_mark'>*</span></th>
                    <td><select name="country_id"  class='jload_competition' style="min-width: 200px;"><?= common::get_country_options(set_value('country_id', $country_id)) ?></select>
                        <?= form_error('country_id', '<span>', '</span>') ?></td>
                </tr>

                <tr>
                    <th>Competition Name<span class='req_mark'>*</span></th>
                    <td><select class="select-style2" name="competitionr_id" id="j_competition_data"  style="min-width: 200px;"><?= common::get_competitionr_options(set_value('country_id',$country_id),set_value('competitionr_id',$competitionr_id)) ?></select>
                        <?= form_error('competitionr_id', '<span>', '</span>') ?>

                    </td>  
                </tr>                 

                <tr>
                    <th>Year<span class='req_mark'>*</span></th>
                    <td>
                        <select class="select-style2" name="year" id=""  style="min-width: 200px;">
                            <option value="">Select Year</option>                                   
                            <?php for ($y = 2010; $y <= 2050; $y++) { ?>
                                <option value="<?= $y ?>" <?php if ($year == $y || $_REQUEST['year']==$y)
                                echo 'selected' ?>><?= $y ?></option>
                            <?php }
                            ?>
                        </select>
                        <?= form_error('year', '<span>', '</span>') ?>

                    </td> 
                    </tr>


                <tr>
                    <th>Host Country Name <span class='req_mark'>*</span></th>
                    <td><select name="host_country_id"  class='jload_club' style="min-width: 200px;"><?= common::get_country_options(set_value('host_country_id', $host_country_id)) ?></select>
                        <?= form_error('host_country_id', '<span>', '</span>') ?></td>
                </tr>
                <tr>
                    <th>Host Club <span class='req_mark'>*</span></th>
                    <td><select class="select-style2" name="competitionr_details_host_club" id="j_club_data"  style="min-width: 200px;"><?= common::get_club_options(set_value('host_country_id',$host_country_id),set_value('competitionr_details_host_club',$competitionr_details_host_club) ) ?></select>
                        <?= form_error('competitionr_details_host_club', '<span>', '</span>') ?>

                    </td>  
                </tr>


                <tr>
                    <th>Competition Round <span class='req_mark'>*</span></th>
                    <td><input type='text' name='competitionr_details_round' value='<?= set_value('competitionr_details_round', $competitionr_details_round) ?>'  style="min-width: 195px;" /><?= form_error('competitionr_details_round', '<span>', '</span>') ?></td>
                </tr> 

<!--                <tr>
                    <th>Competition Venue <span class='req_mark'>*</span></th>
                    <td><input type='text' name='competitionr_details_venue' value='<?= set_value('competitionr_details_venue', $competitionr_details_venue) ?>'  style="min-width: 195px;" /><?= form_error('competitionr_details_venue', '<span>', '</span>') ?></td>
                </tr> -->

                <tr>
                    <th>Competition Date<span class='req_mark'>*</span></th>
                    <td><input type='text' name='competitionr_details_date' value='<?= set_value('competitionr_details_date', $competitionr_details_date) ?>' class='required date_picker' style="min-width: 195px;" /> <?= form_error('competitionr_details_date', '<span>', '</span>') ?></td>
                </tr>



                <tr><th>&nbsp;</th>
                    <td>
                        <input type="hidden" name="sess_value" value="<?= $competitionr_details_id ?>" />
                        <input type='submit' name='save' value='Save' class="button" /> 
                        <input type='button' value='cancel' class="cancel" />
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>