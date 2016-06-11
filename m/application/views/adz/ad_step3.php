<div class="content_m">
    <form id="valid_adz" action="<?= site_url($action) ?>" method="post" enctype="multipart/form-data" >
        <?php
        if ($msg != '') {
            echo "<div class='error'>" . $msg . "</div>";
        }
        ?>
        <?php $parent_id = $this->session->userdata('parent_type_id');
        $type_id_new= $this->session->userdata('type_id_new');
        ?>
        <?php
        $sql = $this->db->query("select model.*, make.make_name
                from model
                left join make on make.make_id=model.make_id
                where main_type_id='$parent_id' group by model.make_id order by make.make_name asc");
        $c_rows = $sql->result_array();
        ?>
        <select name="company_id" class="jmake_step3" id="j_make_data2">
            <option value=''>select Make</option>
            <?php
            foreach ($c_rows as $m_data) {
                if ($session_array[company_id] == $m_data[make_id]) {
                    echo "<option value='$m_data[make_id]' selected='selected'>$m_data[make_name]</option>";
                } else {
                    echo "<option value='$m_data[make_id]' >$m_data[make_name]</option>";
                }
            }
            ?>
        </select>
        <?= form_error('company_id', '<span>', '</span>') ?>
        <select name="model_id" class="jmodel_step3" id="j_model_data3">
            <?php
            if ($session_array[model_id] != '') {
                echo $this->mod_adz->get_model_options_model_selected($session_array[company_id], $session_array[model_id]);
            }
            ?>
        </select>
        <?= form_error('model_id', '<span>', '</span>') ?>
        <div <?php if ($session_array[model_name] != '' && ($session_array[model_id]=='Other' || $session_array[model_id]=='other')) { ?> style="display: block" <?php } else { ?> style="display: none" <?php } ?> id="model_name">
            <input type="text" name="model_name"   size="30" class="select-style2 " value="<?php echo $session_array[model_name]; ?>"/>
        </div>
        <select name="year" class="" ><?= common::get_year($session_array['year']) ?></select>
        <?= form_error('year', '<span>', '</span>') ?>
        <input type="text" name="engine" placeholder="Engine" value="<?= $session_array['engine'] ?>"/>
        <div class="button_l_r">
            <input placeholder="Mileage" type="text" name="mileage" size="30" class="select-style2 " value="<?= $session_array['mileage'] ?>"/>
            <select name="mill_sign">
                <option value="kilometers" <?php if ($session_array[mill_sign] == 'kilometers') { ?> selected="selected" <?php } ?>>kilometers</option>
                <option value="miles" <?php if ($session_array[mill_sign] == 'miles' || $session_array[mill_sign]=='') { ?> selected="selected" <?php } ?>>miles</option>
            </select>
        </div>
        <div class="clear"></div>
        <input type="text" placeholder="Hours" name="hours"  value="<?= $session_array['hours'] ?>"/>  </td>

        <div class="button_p_n">
            <input  class="previous_button" type="submit" onclick="history.back(-1)" value="Previous"/>
            <input  class="next_button" type="submit" name="save" value="Next"/>
            <div class="clear"></div>
        </div>
    </form>
</div>